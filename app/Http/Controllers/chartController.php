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
        $chartJsonData = $request->input('chartJsonData');
        $raw_data = $chartJsonData;
        $chartJsonData = json_decode($chartJsonData, true);

        try {
            foreach ($chartJsonData as $key => $value) {
                array_push($labels, $key);
                array_push($data, $value);
                // Returns a hex code for a 'truly random' color
                array_push($colours, RandomColor::one(array(
                    'luminosity' => 'light',
                    'hue' => 'random',
                    'format' => 'rgbCss',
                )));
            }

        } catch (Exception $e) {
            echo ($e);
        }

        if ($chartName == "") {
            return redirect()->back()->with('fail', 'Chart was not named');
        }

        if (count($labels) > 0 && count($data) > 0) {

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
                ['user_id' => Auth::user()->id, 'chart_name' => $chartName, 'chart_type' => $chartType, 'config' => $config, 'raw_data' => $raw_data]
            );

            if ($query) {
                return redirect()->back()->with('success', 'Chart has been successfully added');
            } else {
                return redirect()->back()->with('fail', 'Something went wrong');
            }
        } else {
            return redirect()->back()->with('fail', 'Data Entered incorrectly');
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
            return redirect()->back()->with('success', 'Chart has been successfully deleted');
        } else {
            return redirect()->back()->with('fail', 'Something went wrong');
        }
    }

    public function favourite($id)
    {

        $original_val = DB::table('charts')->where('user_id', '=', Auth::user()->id)->where('id', $id)->value('if_favourite');

        if ($original_val == 0) {
            $query = DB::table('charts')->where('user_id', '=', Auth::user()->id)->where('id', $id)->update(array('if_favourite' => '1'));
        } else {
            $query = DB::table('charts')->where('user_id', '=', Auth::user()->id)->where('id', $id)->update(array('if_favourite' => '0'));

        }

        // $query = DB::table('charts')->where('user_id', '=', Auth::user()->id)->where('id', $id)->update(array('if_favourite' => !$original_val));

        if ($query) {
            return redirect()->back()->with('success', 'Chart has been successfully Favourited');
        } else {
            return redirect()->back()->with('fail', 'Something went wrong');
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
        $labels = array();
        $data = array();
        $colours = array();

        $chartName = $request->input('chartName');
        $chartType = $request->input('chartType');
        $chartJsonData = $request->input('chartJsonData');
        $raw_data = $chartJsonData;
        $chartJsonData = json_decode($chartJsonData, true);
        $id = $request->id;


        try {
            foreach ($chartJsonData as $key => $value) {
                array_push($labels, $key);
                array_push($data, $value);
                // Returns a hex code for a 'truly random' color
                array_push($colours, RandomColor::one(array(
                    'luminosity' => 'light',
                    'hue' => 'random',
                    'format' => 'rgbCss',
                )));
            }

        } catch (Exception $e) {
            echo ($e);
        }

        if ($chartName == "") {
            return redirect()->back()->with('fail', 'Chart was not named');
        }

        if (count($labels) > 0 && count($data) > 0) {

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

            // DB::table('area')
            //     ->where('id', $request->get('area_id'))
            //     ->update([
            //         'island_group_id' => $request->get('island_group_id'),
            //         'region_id' => $request->get('region_id'),
            //     ]);

            $query = DB::table('charts')->where('id', $id)->update(['user_id' => Auth::user()->id, 'chart_name' => $chartName, 'chart_type' => $chartType, 'config' => $config, 'raw_data' => $raw_data]);

            // print_r($query);

            if ($query) {
                return redirect()->back()->with('success', 'Chart has been successfully Updated');
            } else {
                return redirect()->back()->with('fail', 'Something went wrong');
            }
        } else {
            return redirect()->back()->with('fail', 'Data Entered incorrectly');
        }
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
