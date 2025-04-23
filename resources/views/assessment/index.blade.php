@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">My Assessments</h4>
                    <a href="{{ route('assessment.start') }}" class="btn btn-primary">New Assessment</a>
                </div>

                <div class="card-body">
                    @if($assessments->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Score</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($assessments as $assessment)
                                        <tr>
                                            <td>{{ $assessment->created_at->format('M d, Y H:i') }}</td>
                                            <td>
                                                @if($assessment->status === 'completed')
                                                    <span class="badge bg-{{ $assessment->score >= 70 ? 'success' : ($assessment->score >= 40 ? 'warning' : 'danger') }}">
                                                        {{ $assessment->score }}
                                                    </span>
                                                @else
                                                    <span class="badge bg-secondary">Pending</span>
                                                @endif
                                            </td>
                                            <td>{{ ucfirst($assessment->status) }}</td>
                                            <td>
                                                @if($assessment->status === 'completed')
                                                    <a href="{{ route('assessment.result', $assessment) }}" 
                                                       class="btn btn-sm btn-info">View Results</a>
                                                @else
                                                    <a href="{{ route('assessment.show', $assessment) }}" 
                                                       class="btn btn-sm btn-primary">Continue</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-4">
                            <p class="text-muted mb-3">You haven't taken any assessments yet.</p>
                            <a href="{{ route('assessment.start') }}" class="btn btn-primary">
                                Take Your First Assessment
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection