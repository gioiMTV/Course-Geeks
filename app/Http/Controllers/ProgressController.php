<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\courses\ProgressModel;

class ProgressController extends Controller
{
    public function updateProgress(Request $request)
    {
        try {
            $studentId = $request->input('student_id');
            $lectureId = $request->input('lecture_id');
            $progress = 100;

            // Validate inputs if necessary

            // Check if progress record already exists
            $progressRecord = ProgressModel::where('student_id', $studentId)
                ->where('lecture_id', $lectureId)
                ->first();

            if ($progressRecord) {
                // Update progress
                $progressRecord->progress_now = $progress;
                $progressRecord->save();
            } else {
                // Create new progress record
                ProgressModel::create([
                    'student_id' => $studentId,
                    'lecture_id' => $lectureId,
                    'progress_now' => $progress,
                ]);
            }

            return response()->json(['message' => 'Progress updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error updating progress: ' . $e->getMessage()], 500);
        }
    }
}
