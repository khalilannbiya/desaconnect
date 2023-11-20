<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class CheckAccessComplaint
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $complaintUuid = $request->route('complaint')->id; // Ambil nilai parameter 'aduan' dari URL

        $complaint = Complaint::find($complaintUuid);

        if ($complaint && $complaint->user_id !== Auth::id()) {
            // Jika pengguna saat ini bukan pemilik aduan
            Alert::toast("<strong>Akses tidak diizinkan!</strong>", 'error')->toHtml()->timerProgressBar();
            return redirect()->route('complainant.complaints.index');
        }

        return $next($request);
    }
}
