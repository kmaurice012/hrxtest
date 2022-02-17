<?php

namespace App\Http\Controllers;

use App\Models\Codes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Get a code report for specific company
     */
    public function getCompanyCodeReports(Request $request)
    {
        try {
            // $complied = Codes::leftJoin('rpr_events', 'rpr_codes.id', '=', 'rpr_events.cds_id')
            //     ->leftJoin('rpr_org_codes', 'rpr_codes.id', '=', 'rpr_org_codes.cds_id')
            //     ->leftJoin('rpr_code_compliances', 'rpr_events.id', '=', 'rpr_code_compliances.rev_id')
            //     ->where('rpr_code_compliances.complied', '=', 'complied')
            //     ->where('rpr_codes.id', '=', $request->id)
            //     ->where('rpr_org_codes.ror_id', '=', $request->org_id)
            //     ->get()->count();

            $complied = DB::table('rpr_organizations')->leftJoin('rpr_org_users', 'rpr_organizations.id', '=', 'rpr_org_users.ror_id')
                ->leftJoin('rpr_user_codes', 'rpr_org_users.id', '=', 'rpr_user_codes.rus_id')
                ->leftJoin('rpr_code_compliances', 'rpr_user_codes.id', '=', 'rpr_code_compliances.rcd_id')
                ->leftJoin('rpr_events', 'rpr_code_compliances.rev_id', '=', 'rpr_events.id')
                ->leftJoin('rpr_codes', 'rpr_events.cds_id', '=', 'rpr_codes.id')
                ->where('rpr_code_compliances.complied', '=', 'complied')
                ->where('rpr_codes.id', '=', $request->id)
                ->where('rpr_organizations.id', '=', $request->org_id)
                ->get()->count();

            $notComplied = DB::table('rpr_organizations')->leftJoin('rpr_org_users', 'rpr_organizations.id', '=', 'rpr_org_users.ror_id')
                ->leftJoin('rpr_user_codes', 'rpr_org_users.id', '=', 'rpr_user_codes.rus_id')
                ->leftJoin('rpr_code_compliances', 'rpr_user_codes.id', '=', 'rpr_code_compliances.rcd_id')
                ->leftJoin('rpr_events', 'rpr_code_compliances.rev_id', '=', 'rpr_events.id')
                ->leftJoin('rpr_codes', 'rpr_events.cds_id', '=', 'rpr_codes.id')
                ->where('rpr_code_compliances.complied', '=', 'not complied')
                ->where('rpr_codes.id', '=', $request->id)
                ->where('rpr_organizations.id', '=', $request->org_id)
                ->get()->count();

            $dataCount = array([
                'Complied' => $complied,
                'Not complied' => $notComplied
            ]);
            $data = [
                'success' => true,
                'data' => $dataCount
            ];

            return response()->json($data, 200);
        } catch (\Throwable $th) {
            logger($th);

            $data = [
                'success' => false,
                'message' => 'An error occured while getting code reports'
            ];
            return response()->json($data, 500);
        }
    }
    /**
     * Get code reports for all companies
     */
    public function getCodeReport(Request $request)
    {
        try {
            $complied = DB::table('rpr_codes')->leftJoin('rpr_events', 'rpr_codes.id', '=', 'rpr_events.cds_id')
                ->leftJoin('rpr_code_compliances', 'rpr_events.id', '=', 'rpr_code_compliances.rev_id')
                ->where('rpr_code_compliances.complied', '=', 'complied')
                ->where('rpr_codes.id', '=', $request->id)
                ->get()->count();

            $notComplied = DB::table('rpr_codes')->leftJoin('rpr_events', 'rpr_codes.id', '=', 'rpr_events.cds_id')
                ->leftJoin('rpr_code_compliances', 'rpr_events.id', '=', 'rpr_code_compliances.rev_id')
                ->where('rpr_code_compliances.complied', '=', 'not complied')
                ->where('rpr_codes.id', '=', $request->id)
                ->get()->count();

            $dataCount = array([
                'Complied' => $complied,
                'Not complied' => $notComplied
            ]);
            $data = [
                'success' => true,
                'data' => $dataCount
            ];

            return response()->json($data, 200);
        } catch (\Throwable $th) {
            logger($th);

            $data = [
                'success' => false,
                'message' => 'An error occured while getting code reports'
            ];
            return response()->json($data, 500);
        }
    }
}
