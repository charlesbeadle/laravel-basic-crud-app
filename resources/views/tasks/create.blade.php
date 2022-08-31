<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Home maintenance | Create a task">
  @vite(['resources/js/app.js', 'resources/scss/main.scss'])
  <title>Create a task</title>
</head>
<body class="p-3 p-lg-5">
  <div class="mx-auto container">
    <div class="row">
      <div class="mx-auto col col-lg-7">
        <h1 class="mb-4">Create a task</h1>
        <form class="mb-5 p-3 rounded-3 task-form" action="{{ route('tasks.store') }}" method="post">
          @csrf
          <div class="mb-3">
            <label class="form-label" for="task">Task</label>
            <input class="form-control @error('task') is-invalid @enderror" type="text" id="task" name="task" value="{{ old('task') }}">
            @error('task')
              <p class="text-danger pt-1">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-3">
            <label class="form-label" for="description">Description</label>
            <input class="form-control @error('description') is-invalid @enderror" type="text" id="description" name="description" value="{{ old('description') }}">
            @error('description')
              <p class="text-danger pt-1">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-3">
            <label class="form-label" for="due">Due</label>
            <input class="form-control @error('due') is-invalid @enderror" type="date" id="due" name="due" value="{{ old('due') }}">
            @error('due')
              <p class="text-danger pt-1">{{ $message }}</p>
            @enderror
          </div>
          <button class="btn" type="submit">Create task</button>
        </form>        
      </div>
    </div>
  </div>
</body>
</html>