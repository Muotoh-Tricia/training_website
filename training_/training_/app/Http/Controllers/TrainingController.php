<?php

namespace App\Http\Controllers;

use App\Models\Trainee;
use App\Models\TrainingCenter;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function getAllTrainees()
    {
        // route --> /trainess/
        // $trainees = Trainee::with('training_center')->orderBy('created_at', 'desc');
        $trainees = Trainee::with('training_center')->latest()->paginate(10);

        return view('trainees.index', ['trainees' => $trainees]);
    }

    public function getTraineeById($id)
    {
        // route -->/trainees/{id}
        $trainee = Trainee::with('training_center')->findOrFail($id);

        return view('trainees.show', ['trainee' => $trainee]);
    }


    public function createNewTraineeForm()
    {
        // route --> /trainees/create
        $trainingCenters = TrainingCenter::all();

        return view('trainees.create', ["training_centers" => $trainingCenters]);
    }

    public function saveNewTrainee(Request $request)
    {
        // --> /trainees/ (POST)
        // Handle POST request to store a new trainee record in table
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'skill' => 'required|integer|min:0|max:100',
            'bio' => 'required|string|min:20|max:100',
            'training_center_id' => 'required|exists:training_centers,id',
            // Add other validation rules as needed
        ]);

        Trainee::create($validatedData);

        return redirect()->route('trainees.index')
            ->with('success', 'Trainee created successfully.');
    }

    public function editExistingTraineeForm($id)
    {
        // --> /trainees/{id}/edit
        $trainee = Trainee::findOrFail($id);
        $training_centers = TrainingCenter::all();

        return view('trainees.edit', compact('trainee', 'training_centers'));
    }

    public function updateExistingTrainee(Request $request, $id)
    {
        // --> PUT/PATCH /trainees/{id}
        // Validate the incoming data
        $validatedData = $request->validate([
            'name' => 'string|max:255',
            'skill' => 'integer|min:0|max:100',
            'bio' => 'string',
            'training_center_id' => 'required|exists:training_centers,id',
        ]);

        // Fetch the trainee using the ID
        $trainee = Trainee::findOrFail($id);

        // Update the trainee's information
        $trainee->update($validatedData);

        // Redirect back to a list or details page with a success message
        return redirect()->route('trainees.index')
            ->with('success', 'Trainee updated successfully.');
    }

    public function deleteTraineeById($id)
    {
        // dd($id);
        // --> /trainees/{id} DELETE
        // Handle delete request to delete a trainee record from a table
        $trainee = Trainee::findOrFail($id);
        $trainee->delete();

        return redirect()->route('trainees.index')->with('success', 'Trainee deleted successfully');
    }
}
