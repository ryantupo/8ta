<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use \Colors\RandomColor;
use \stdClass;

class chartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('chart.addchart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $labels = array();
        $data = array();
        $colours = array();
        $chartName = $request->input('chartName');
        $chartType = $request->input('chartType');

        for ($i = 0; $i < $request->input('amountDataPoints'); $i++) {
            array_push($labels, $request->input("dataTextAreaD1" . strval($i)));
            array_push($data, $request->input("dataTextAreaD2" . strval($i)));
            // Returns a hex code for a 'truly random' color
            array_push($colours, RandomColor::one(array(
                'luminosity' => 'light',
                'hue' => 'random',
                'format' => 'rgbCss',
            )));
        }

        // function generateChartJson(chartName, chartType, label, data, colours) {

        $datasets = new stdClass();
        $datasets->label = $chartName;
        $datasets->data = $data;
        $datasets->backgroundColor = $colours;
        $datasets->hoverOffset = 4;

        $datasetsArray = [];

        array_push($datasetsArray, $datasets);

        $data = new stdClass();
        $data->labels = $labels;
        $data->datasets = $datasetsArray;

        $config = json_encode(array(
            'type' => $chartType,
            'data' => $data)
        );

        $query = DB::table('charts')->insert(
            ['user_id' => Auth::user()->id, 'chart_name' => $chartName, 'chart_type' => $chartType, 'config' => $config]
        );

        if ($query) {
            return back()->with('success', 'Chart has been successfully added');
        } else {
            return back()->with('fail', 'Something went wrong');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $query = DB::table('charts')->where('user_id', '=', Auth::user()->id)->where('id', '=', $id)->delete();

        if ($query) {
            return back()->with('success', 'Chart has been successfully deleted');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Iluminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
