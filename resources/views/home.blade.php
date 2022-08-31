<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="A home maintenance application.">
  @vite(['resources/js/app.js', 'resources/scss/main.scss'])
  <title>Maintenance Schedule | Dashboard</title>
</head>
<body class="p-3 p-lg-5">
  <div class="mx-auto container">
    <div class="row">
      <div class="mx-auto col col-lg-7">
        <h1 class="mb-4">Home Maintenance</h1>
        @if (!count($tasks))
          <p class="fs-5">It looks like there are no tasks. Would you like to <a href="{{ route('tasks.create') }}">create a task?</a></p>
        @endif
        @foreach($tasks as $task)
        <ul class="list-unstyled">
          <a href="{{ route('tasks.edit', $task->id) }}" class="text-decoration-none">
            <li class="p-3 rounded-3 task">
              <p class="fs-5">{{ $task->task }}</p>
              <p class="fs-6">Note: {{ $task->description }}</p>
              <p class="fs-6">Due date: {{ $task->due }}</p>
              <form action="{{ route('tasks.destroy', $task->id) }}" method="post">
                @method('delete')
                @csrf
                <button class="btn" type="submit">Delete</button>
              </form>
            </li>
          </a>
        </ul>
        @endforeach
      </div>
    </div>
    @if (session('success'))
      <div class="alert alert-success flash-msg">
        <p class="m-0 text-center">{{ session('success') }}</p>
      </div>
    @endif
  </div>
</body>
</html>