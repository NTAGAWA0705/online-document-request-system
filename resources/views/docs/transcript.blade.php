@if (auth()->user())
    <script>
        window.print()
    </script>
@endif

{{-- https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=https://www.showrwanda.com --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.1/css/all.min.css" integrity="sha512-3M00D/rn8n+2ZVXBO9Hib0GKNpkm8MSUU/e2VNthDyBYxKWG+BftNYYcuEjXlyrSO637tidzMBXfE7sQm0INUg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <title>Transcript</title>
</head>
<body>
    <main class="container bg-white">
        <div class="header">
            <h1 class="text-center">ACADEMIC TRANSCRIPT</h1>
            <div class="d-flex justify-content-around">
                <div class="left">
                    <div class="">Surname: <b>{{ $student->last_name }}</b></div>
                    <div class="">First Name: <b>{{ $student->first_name }}</b></div>
                    <div class="">Academic year: <b>2021-2022</b></div>
                    <div class="">Reg N<sup>0</sup>: <b>{{ $student->ref_number }}</b></div>
                    <div class="">ID N<sup>0</sup>: <b>1199922625172781</b></div>
                </div>
                <div class="right">
                    <div class="">Faculty: <b>Applied Fundamental Sciences</b></div>
                    <div class="">Department: <b>Computer Science</b></div>
                    <div class="">Level: <b>III</b></div>
                    <div class="">Option: <b>Software Engineering</b></div>
                </div>
            </div>
            <div class="my-2">
                <table class="table table-bordered border-dark" style="border-color: black">
                    <thead>
                        <tr>
                            <th>Module Code</th>
                            <th>Module title</th>
                            <th>Module content</th>
                            <th>Credits</th>
                            <th>Marks</th>
                            <th>Credit weighed marks</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total = 0;
                            
                        @endphp


                        @foreach ($courses as $course)
                        @php
                            $total += $course->course->grade->marks;
                        @endphp
                            <tr>
                                <td>{{$course->course_id}}</td>
                                <td>{{$course->course->course_name}}</td>
                                <td>{{$course->course->course_name}}</td>
                                <td>{{$course->course->credits}}</td>
                                <td><strong>{{ $course->course->grade->marks }}</strong></td>
                                <td><strong>{{ (float) $course->course->grade->marks * $course->course->credits }}</strong></td>
                            </tr>                            
                        @endforeach
                        <tr>
                            <td colspan="5">Total</td>
                            <td>{{ $total }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="signatures d-flex justify-content-around align-items-center">
                <div class="names text-center">
                    <b><i>Signed digitally by Deputy Vice Chancellor Academics and Research<br /> Dr SINDAYIGAYA Samuel</i>
                </div>
                <div class="sgnature">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=https://{{ env('APP_URL') . '/transcripts/'. $doc_id .'/' }}" alt="QR Code">
                </div>
            </div>
        </div>
    </main>
</body>
</html>