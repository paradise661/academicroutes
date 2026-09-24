<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ReviewController extends Controller
{

    public function index()
    {
        $review = Review::latest()->paginate(10);
        return view('admin.review.index', compact('review'));
    }


    public function create()
    {
        return view('admin.review.create');
    }


    public function store(StoreReviewRequest $request)
    {
        $input = $request->all();

        // Handle image upload
        $input['image'] = fileUpload($request, 'image', 'review');

        // Generate slug
        $input['slug'] = Str::slug($request->name);

        // Create the review
        Review::create($input);

        return redirect()->route('review.index')->with('message', 'Created Successfully');
    }


    public function edit(Review $review)
    {
        return view('admin.review.edit', compact('review'));
    }


    public function update(UpdateReviewRequest $request, Review $review)
    {
        $input = $request->all();
        $old_image = $review->image;

    
        $image = fileUpload($request, 'image', 'review');

        if ($image) {
            removeFile($old_image);
            $input['image'] = $image;
        } else {
            unset($input['image']);
        }

        // Generate slug
        $input['slug'] = Str::slug($request->name);

        // Update the review
        $review->update($input);

        return redirect()->route('review.edit', $review->id)->with('message', 'Updated Successfully');
    }


    public function destroy(Review $review)
    {
        // Remove image if it exists
        // if ($review->image && file_exists(public_path('storage/' . $review->image))) {
        //     unlink(public_path('storage/' . $review->image));
        // }
        removeFile($review->image);

        // Delete the review
        $review->delete();

        return redirect()->route('review.index')->with('message', 'Deleted Successfully');
    }
}
