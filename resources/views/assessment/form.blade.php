@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Health Assessment</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('assessment.submit', $assessment) }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <label class="form-label">1. How would you rate your overall health?</label>
                            <div class="form-check">
                                <input type="radio" name="q1" value="excellent" class="form-check-input" required>
                                <label class="form-check-label">Excellent</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="q1" value="good" class="form-check-input">
                                <label class="form-check-label">Good</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="q1" value="fair" class="form-check-input">
                                <label class="form-check-label">Fair</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="q1" value="poor" class="form-check-input">
                                <label class="form-check-label">Poor</label>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">2. Do you experience chronic pain?</label>
                            <div class="form-check">
                                <input type="radio" name="q2" value="yes" class="form-check-input" required>
                                <label class="form-check-label">Yes</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="q2" value="no" class="form-check-input">
                                <label class="form-check-label">No</label>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">3. How often do you exercise?</label>
                            <div class="form-check">
                                <input type="radio" name="q3" value="daily" class="form-check-input" required>
                                <label class="form-check-label">Daily</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="q3" value="weekly" class="form-check-input">
                                <label class="form-check-label">Weekly</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="q3" value="rarely" class="form-check-input">
                                <label class="form-check-label">Rarely</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="q3" value="never" class="form-check-input">
                                <label class="form-check-label">Never</label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('assessment.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Submit Assessment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection