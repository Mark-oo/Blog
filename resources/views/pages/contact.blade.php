@extends('main')

@section('title','| Countact')


@section('content')
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>Contact Us</h1>
          <hr>
          <form class="" action="index.html" method="post">
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" name="email" class="form-control" id="email">
            </div>
            <div class="form-group">
              <label for="subject">Subject:</label>
              <input type="text" name="subject" class="form-control" id="subject">
            </div>
            <div class="form-group">
              <label for="message">Message:</label>
              <textarea name="message" id="message" class="form-control" rows="8" cols="80">Write to us here...</textarea>
            </div>
          </form>
          <button type="submit" class="btn btn-primary">Send Message</button>
        </div>

      </div>

    </div>

@endsection
