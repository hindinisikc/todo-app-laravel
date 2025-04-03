<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>

    <!-- Link External CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

    <div class="todo-container">
        <h1>To-Do List <span>📝</span></h1>

        <div class="task-input">
            <button id="openModalBtn" class="add-btn">Add</button>
        </div>

        <!-- Modal -->
        <div id="taskModal" class="modal">
            <div class="modal-content">
                <span class="close" id="closeModalBtn">&times;</span>
                <h2>Add Task</h2>
                <form action="{{ route('tasks.store') }}" method="POST">
                    @csrf
                    <input type="text" name="title" placeholder="Task Title" required><br><br>

                    <select name="day" required>
                        <option value="" disabled selected>Choose a Day</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                        <option value="Sunday">Sunday</option>
                        
                    </select><br><br>

                    <input type="time" name="time" required><br><br>

                    <button type="submit" class="add-btn">Add Task</button>
                </form>
            </div>
        </div>

        <!-- Task List -->
        <ul class="task-list">
            @foreach ($tasks as $task)
                <li>
                    <input type="checkbox" {{ $task->completed ? 'checked' : '' }}>
                    <span>
                        <span class="{{ $task->completed ? 'completed' : '' }}">{{ $task->title }}</span>
                        <span class="date-time">{{ $task->day }} at {{ $task->time }}</span>
                    </span>
                    <form action="{{ route('tasks.update', ['task' => $task->id]) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PUT')
                        <button type="submit">{{ $task->completed ? 'Undo' : 'Complete' }}</button>
                    </form>
                    <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn">×</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- Link External JavaScript -->
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
