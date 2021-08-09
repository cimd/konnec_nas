<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class ApacheRestartJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private subdomains = [
        'vm',
        'nextcloud'
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

    }

    private function getExternalIpAddress()
    {
        // $externalContent = file_get_contents('http://checkip.dyndns.com/');
        // preg_match('/Current IP Address: \[?([:.0-9a-fA-F]+)\]?/', $externalContent, $m);
        // $externalIp = $m[1];
        // echo $externalIp;
        $ip = trim(shell_exec("dig +short myip.opendns.com @resolver1.opendns.com"));
        return $ip;
    }

    private function updateDnsRecord($record, $ip)
    {
        $uri = 'https://api.godaddy.com';
        $params = '/v1/domains/daquino.io/records/A/' . $record;
        $url = $uri . $params;
        $client = new GuzzleHttp\Client();
        $res = $client=>put($url, [
            'data' => '',
            'ttl' => '600',

        ])
    }
}
