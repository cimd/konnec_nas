<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Http;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class UpdateGodaddyJob
{
    use Dispatchable, InteractsWithQueue, SerializesModels;

    private $subdomains = [
        'vm',
        'nextcloud',
        '@',
        'api',
        'hassio',
        'mail.daquino.io',
        'webmin',
        'dashboard'
    ];

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $ip = $this->getExternalIpAddress();
        foreach ($this->subdomains as $record) {
            $this->updateDnsRecord($record, $ip);
        }
    }

    private function getExternalIpAddress()
    {
        $response = Http::get('http://checkip.dyndns.com/');
        preg_match('/Current IP Address: \[?([:.0-9a-fA-F]+)\]?/', $response, $m);
        $externalIp = $m[1];
        return $externalIp;
    }

    private function updateDnsRecord($record, $ip, $port = 80)
    {
        $uri = 'https://api.godaddy.com';
        $query = '/v1/domains/daquino.io/records/A/' . $record;
        $url = $uri . $query;

        $res = Http::withHeaders([
            'Authorization' => 'sso-key dKYSYpT8xzja_HzxKHana9FhN8gYRfkL8Tv:HadBYZ1rmSavHUN9AWLAJa',
            'Content-Type' => 'application/json',
            ])->withBody('[{
                "data": "' . $ip . '",
                "port": ' . $port . ',
                "priority": 10,
                "protocol": "string",
                "service": "string",
                "ttl": 601,
                "weight": 10
            }]','application/json')
            ->put($url);
        return $res->status();
    }
}
