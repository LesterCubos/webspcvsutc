@extends('layouts.show')
<head>
    <!-- Main CSS File -->

  <link href="{{ asset('css/admissiomrandp.css') }}" rel="stylesheet">
  </head>
@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    @include('incshow.bread')
    <nav>
      <div class="container">
        <ol>
          <li><a href="/"><i class='bx bxs-home'></i> Home</a></li>
          <li>Admission</li>
          <li></li>
        </ol>
      </div>
    </nav>
  </div><!-- End Breadcrumbs -->

  <!-- ======= Admission Requirements and Procedure Section ======= -->
  <section id="admissionrandp" class="admissionrandp">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h3><span>Admission </span>Requirements and Procedure</h3>
        <p>Aperiam dolorum et et wuia molestias qui eveniet numquam nihil porro incidunt dolores placeat sunt id nobis omnis tiledo stran delop</p>
      </div>

      <h2>Announcement:</h2>
      <p>ADMISSION REQUIREMENTS AND PROCEDURES FOR FIRST SEMESTER, AY 2023-2024</p><br>
      <h2>IMPORTANT DATES TO REMEMBER:</h2>
      <p>Please be reminded of the following schedules of the student admission for the First Semester of the Academic Year 2023 - 2024.</p>
      <table class="table table-bordered table-hover">
          <thead class="table-dark">
            <tr>
              <th scope="col">Dates</th>
              <th scope="col">Steps in the Admission Procedure</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>January 31, 2023 - April 13, 2023</td>
              <td>Application and Submission of Requirements</td>
            </tr>
            <tr>
              <td>March 2, 2023 <br>
                  April 3, 2023 <br>
                  April 11, 2023 <br>
                  April 18, 2023</td>
              <td>Schedule of Entrance Exam</td>
            </tr>
            <tr>
              <td>May 17, 2023</td>
              <td>Release of Entrance Exam Results</td>
            </tr>
            <tr>
              <td>TBA</td>
              <td>Completion of requirments</td>
            </tr>
          </tbody>
        </table> <br>
      <h2>APPLICATION PROCEDURE</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo nesciunt reprehenderit error recusandae voluptatum doloremque tempora nobis libero quae corrupti assumenda, voluptate beatae modi dignissimos facilis quos! Error, dicta eum.</p><br>
      <h2>DOCUMENTS/CREDENTIALS TO BE SUBMITTED: </h2>
      <p>First year applicants</p>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore est eaque suscipit tenetur, commodi inventore voluptates minima dolore aspernatur? Quod enim ipsa quos placeat quas at perspiciatis fuga voluptatibus cumque.</p><br>
      <h2>REMINDERS AND THINGS TO BRING DURING EXAMINATION</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, in reiciendis! Nihil iure molestiae recusandae odit aliquam deserunt asperiores dolorem illum doloribus assumenda architecto officia quod, cupiditate repellendus obcaecati blanditiis!</p><br>
      <h2>HEALTH PROTOCOLS DURING THE ADMISSION EXAMINATION</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, in reiciendis! Nihil iure molestiae recusandae odit aliquam deserunt asperiores dolorem illum doloribus assumenda architecto officia quod, cupiditate repellendus obcaecati blanditiis!</p><br>

    </div>
  </section><!-- End Admission Requirements and Procedure Section -->


@endsection
