<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyReviewRequest;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Models\Review;
use App\Models\Tag;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ReviewController extends Controller
{
    use MediaUploadingTrait;
    public function index()
    {
        abort_if(Gate::denies('review_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
       
        $eventsController = new EventController();
        $events = $eventsController->getEventData(); 

        $reviews = Review::all();

        return view('admin.reviews.index', compact('reviews', 'events'));
    }

}
