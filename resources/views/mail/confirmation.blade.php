<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="{{asset('css/confirmation.css')}}">
    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
  </head>-
  <body>

    <div class="code-playground">
      <h3>Enter Code From Your Mail Inbox.</h3>
      <form class='code_input' action="{{route('mail.confirmation')}}" method="POST">
        @csrf
        <section class="code-input">
          <input class="code-inputs" name="digit1" maxlength='1' autofocus=''>
          <input class="code-inputs" name="digit2" maxlength='1'>
          <input class="code-inputs" name="digit3" maxlength='1'>
          <input class="code-inputs" name="digit4" maxlength='1'>
          <input class="code-inputs" name="digit5" maxlength='1'>
          <input class="code-inputs" name="digit6" maxlength='1'>
        </section>
        <br>
        <button type="reset" class="button secondary-bg-color"> Reset </button>
        <button type="submit" name="button" class="button main-bg-color"> Confirm </button>
      </form>
    </div>

  <script type="text/javascript" src="{{asset('js/confirmation.js')}}"></script>


  </body>
</html>
