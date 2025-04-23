@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Assessment Results</h4>
                </div>

                <div class="card-body">
                    <div class="text-center mb-4">
                        <h2>Your Health Score</h2>
                        <div class="display-1 mb-2">{{ $assessment->score }}</div>
                        <div class="badge bg-{{ $assessment->score >= 70 ? 'success' : ($assessment->score >= 40 ? 'warning' : 'danger') }} fs-5 mb-3">
                            {{ $assessment->score >= 70 ? 'Good Health' : ($assessment->score >= 40 ? 'Fair Health' : 'Needs Attention') }}
                        </div>
                    </div>

                    <div class="mb-4">
                        <h5>Your Responses:</h5>
                        <div class="list-group">
                            <div class="list-group-item">
                                <h6 class="mb-1">Overall Health</h6>
                                <p class="mb-0">{{ ucfirst($assessment->results['q1']) }}</p>
                            </div>
                            <div class="list-group-item">
                                <h6 class="mb-1">Chronic Pain</h6>
                                <p class="mb-0">{{ ucfirst($assessment->results['q2']) }}</p>
                            </div>
                            <div class="list-group-item">
                                <h6 class="mb-1">Exercise Frequency</h6>
                                <p class="mb-0">{{ ucfirst($assessment->results['q3']) }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h5>Recommendations:</h5>
                        @if($assessment->score >= 70)
                            <div class="alert alert-success">
                                <p>Great job maintaining your health! Keep up your current routine.</p>
                            </div>
                        @elseif($assessment->score >= 40)
                            <div class="alert alert-warning">
                                <p>There's room for improvement. Consider increasing your physical activity and consulting with a healthcare provider.</p>
                            </div>
                        @else
                            <div class="alert alert-danger">
                                <p>We recommend scheduling an appointment with a healthcare provider to discuss your health concerns.</p>
                            </div>
                        @endif
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('assessment.index') }}" class="btn btn-secondary">Back to Assessments</a>
                        <a href="{{ route('assessment.start') }}" class="btn btn-primary">Take Another Assessment</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection