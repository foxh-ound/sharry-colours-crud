<?php
/**
 * @author Karel
 * @date 2023/08/15
 */
namespace App\Http\Controllers;

use App\Http\Requests\ColourEditPostRequest;
use Illuminate\Http\Request;
use App\Models\Colour;

class ColourController extends Controller
{
    /**
     * Shows a list of Colours and the buttons to either Edit or Delete each of the records
     *
     * @return View
     */
    public function index() {
        $colours = Colour::all()->sortByDesc('id');
        return view('colours/index', ['colours' => $colours]);
    }

    /**
     * Edits or creates a new Colour record
     *
     * If ID provided is 0, show an empty edit form for a new record
     * If ID provided exists in the Database, show and fill the edit form with an existing record's data
     * If ID provided does not exist in the Database, show the not_found error
     *
     * @param ID $id Internal ID of the Colour
     *
     * @return View
     */
    public function edit($id) {
        $colour = Colour::find($id);
        if ($id == 0 || $colour) {
            return view('colours/edit', ['id' => $id, 'colour' => $colour]);
        } else {
            return view('colours/errors/not_found', ['id' => $id]);
        }
    }

    /**
     * Validates and saves/updates a Colour record
     *
     * If validation fails the user gets redirected to the edit form
     * If validation passes the user gets redirected to the list of colours
     *
     * @param ID $id Internal ID of the Colour
     *
     * @return Redirect
     */
    public function save($id, ColourEditPostRequest $request) {
        if ($id == 0) {
            $colourModel = new Colour;
        } else {
            $colourModel = Colour::find($id);
        }
        $colourModel->hex = strtoupper($request['hex']);
        ($colourModel->save()) ? $errorSaving = 'no' : $errorSaving = 'yes';
        return redirect()->route('colours.index', ['error_saving' => $errorSaving]);
    }

    /**
     * Removes a Colour record
     *
     * If validation fails the user gets redirected to the edit form
     * If validation passes the user gets redirected to the list of colours
     *
     * @param ID $id Internal ID of the Colour
     *
     * @return Redirect
     */
    public function remove($id) {
        $colour = Colour::find($id);
        if ($colour) {
            $colour->delete();
            $errorDeleting = 'no';
        } else {
            $errorDeleting = 'yes';
        }

        return redirect()->route('colours.index', ['error_deleting' => $errorDeleting]);
    }

}
