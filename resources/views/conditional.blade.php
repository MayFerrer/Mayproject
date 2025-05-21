@extends('layout.layout1')

@section('title', 'Conditional Page')

@section('content')
<div class="container mt-5 d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="row w-100">
        <!-- Grade Section -->
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h3 class="card-title">Grades</h3>
                    <p class="card-text">
                        @if(!isset($grade) || !is_numeric($grade))
                            <strong class="text-danger">Invalid Grade</strong>
                        @elseif($grade >= 1 && $grade <= 74)
                            Your grade {{ $grade }} = 5.00
                        @elseif($grade == 75)
                            Your grade {{ $grade }} = 3.00
                        @elseif($grade >= 76 && $grade <= 79)
                            Your grade {{ $grade }} = 2.75
                        @elseif($grade >= 80 && $grade <= 81)
                            Your grade {{ $grade }} = 2.50
                        @elseif($grade >= 82 && $grade <= 84)
                            Your grade {{ $grade }} = 2.25
                        @elseif($grade >= 85 && $grade <= 87)
                            Your grade {{ $grade }} = 2.00
                        @elseif($grade >= 88 && $grade <= 90)
                            Your grade {{ $grade }} = 1.75
                        @elseif($grade >= 91 && $grade <= 93)
                            Your grade {{ $grade }} = 1.50
                        @elseif($grade >= 94 && $grade <= 96)
                            Your grade {{ $grade }} = 1.25
                        @elseif($grade >= 97 && $grade <= 100)
                            Your grade {{ $grade }} = 1.00
                        @else
                            <strong class="text-danger">Invalid Grade</strong>
                        @endif
                    </p>

                    <p>Star Pattern</p>
                    <pre>
@php
$s = 10;
for ($i = 0; $i <= $s; $i++) {
    for($j = 0; $j <= $i; $j++) {
        if($j == 0 || $i == $s || $j == $i) {
            echo "*";
        } else {
            echo "_";
        }
    }
    echo "\n";
}
@endphp
                    </pre>
                </div>
            </div>
        </div>

        <!-- Student List Section -->
        <div class="col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h1 class="text-center">Student List</h1>

                    @php
                        $students = [
                            ['name' => 'John Doe', 'age' => 20, 'color' => 'blue'],
                            ['name' => 'Jane Smith', 'age' => 22, 'color' => 'red'],
                            ['name' => 'Alice Johnson', 'age' => 19, 'color' => 'green'],
                            ['name' => 'Bob Williams', 'age' => 21, 'color' => 'yellow'],
                            ['name' => 'Charlie Brown', 'age' => 23, 'color' => 'purple'],
                            ['name' => 'David Lee', 'age' => 20, 'color' => 'orange'],
                            ['name' => 'Ella Garcia', 'age' => 18, 'color' => 'pink'],
                            ['name' => 'Frank Miller', 'age' => 22, 'color' => 'cyan'],
                            ['name' => 'Grace Wilson', 'age' => 19, 'color' => 'magenta'],
                            ['name' => 'Henry Thomas', 'age' => 21, 'color' => 'black'],
                        ];
                    @endphp

                    <table class="table table-bordered table-striped text-center">
                    <thead style="background-color: #3dadb7; color: white;">
                            <tr>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Favorite Color</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student['name'] }}</td>
                                    <td>{{ $student['age'] }}</td>
                                    <td>{{ ucfirst($student['color']) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
