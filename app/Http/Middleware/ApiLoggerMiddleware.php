<?php
namespace App\Http\Middleware;
use Closure;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

final class ApiLoggerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //$uri = $request->path();//get endpoint from url-need to discuss with anand sir for storing in api_logs table
        $requestID = Uuid::generate()->string;
        $uri = $request->path();
        //Insert this into the log table, 
        //TODO: Verify endpoint column in api_logs with Annand, column does not exists
        $logId = DB::table('api_logs')->insertGetId([
            'request_id' => $requestID,
            'endpoint'=>$uri, 
            'request' => $request->getContent(), 
            'request_received_at' => date("Y-m-d H:i:s")
        ]);

        $response = $next($request);
        
        // No value for $response->status() if $response is BinaryFileResponse.
        if ($response instanceof BinaryFileResponse) {
            $status = 200;
        } else {
            $status = $response->status();
        }

        DB::table('api_logs')
            ->where('id', $logId)
            ->update([
                'response' => $response->getContent(), 
                'http_status' => $status, 
                'response_sent_at' => date("Y-m-d H:i:s")
            ]);

        return $response;
    }
}
