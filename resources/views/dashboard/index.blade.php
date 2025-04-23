@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 class="mb-4">Dashboard</h2>

            <!-- Statistics Cards -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Latest Assessment</h5>
                            @if($latestAssessment)
                                <div class="display-4">{{ $latestAssessment->score }}</div>
                                <div class="badge bg-{{ $latestAssessment->score >= 70 ? 'success' : ($latestAssessment->score >= 40 ? 'warning' : 'danger') }}">
                                    {{ $latestAssessment->score >= 70 ? 'Good Health' : ($latestAssessment->score >= 40 ? 'Fair Health' : 'Needs Attention') }}
                                </div>
                            @else
                                <p class="text-muted">No assessments yet</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Assessments</h5>
                            <div class="display-4">{{ $totalAssessments }}</div>
                            <p class="text-muted mb-0">Completed assessments</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Assessment History -->
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Assessment History</h5>
                    <a href="{{ route('assessment.start') }}" class="btn btn-primary btn-sm">Take New Assessment</a>
                </div>
                <div class="card-body">
                    @if($recentAssessments->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="text-center" style="width: 5%;">#</th>
                                        <th style="width: 20%;">Date</th>
                                        <th class="text-center" style="width: 15%;">Score</th>
                                        <th style="width: 35%;">Health Status</th>
                                        <th class="text-center" style="width: 25%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentAssessments as $key => $assessment)
                                        <tr class="align-middle">
                                            <td class="text-center fw-bold">{{ $key + 1 }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <i class="far fa-calendar-alt text-primary me-2"></i>
                                                    {{ $assessment->created_at->format('M d, Y H:i') }}
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="badge bg-{{ $assessment->score >= 70 ? 'success' : ($assessment->score >= 40 ? 'warning' : 'danger') }} p-2 w-75">
                                                    {{ $assessment->score }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="dot bg-{{ $assessment->score >= 70 ? 'success' : ($assessment->score >= 40 ? 'warning' : 'danger') }} me-2"></span>
                                                    <span class="fw-medium">
                                                        {{ $assessment->score >= 70 ? 'Good Health' : ($assessment->score >= 40 ? 'Fair Health' : 'Needs Attention') }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('assessment.result', $assessment) }}" 
                                                   class="btn btn-sm btn-info px-3 rounded-pill">
                                                    <i class="fas fa-eye me-1"></i> View Details
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Update pagination section -->
                        <div class="mt-4 d-flex justify-content-center">
                            {!! $recentAssessments->render() !!}
                        </div>
                    @else
                        <p class="text-center text-muted my-4">No assessment history available. 
                            <a href="{{ route('assessment.start') }}">Take your first assessment</a>
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- Add this CSS to your layout or in a style tag -->
<style>
    .dot {
        height: 10px;
        width: 10px;
        border-radius: 50%;
        display: inline-block;
    }
    .table th {
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.875rem;
    }
    .table td {
        font-size: 0.95rem;
    }
    .badge {
        font-weight: 500;
        font-size: 0.875rem;
    }
    .btn-info {
        color: white;
    }
    .btn-info:hover {
        color: white;
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
</style>