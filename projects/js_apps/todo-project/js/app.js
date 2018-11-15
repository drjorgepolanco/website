/* The Presenter */

(function () { 'user strict';

	window.todo = new Todo();

	// HTML template for a single todo item
	var todoTemplate = $('#templates .todo-item').html(), $root = $('#todo-list');


	/* Listen to user events */

	// 2. When the form submits, add a new todo via the model
	$('form.new-todo').on('submit', function (e) {
		e.preventDefault();
		var item = $('#new-todo-text').val();
		todo.add(item);
		$('#new-todo-text').val('');
	});

	// 3. When the user clicks the 'x' button, remove the todo via the model
	$root.on('click', '.destroy', function (e) {
		e.preventDefault();
		var id = $(this).closest('.todo-item').data('id')
		todo.remove(id);
	});

	
	/* Listen to model events */
	
	// 1. When a new todo is added, generate new html to show it on the page
	todo.on('add', function (newTodo) {
		console.log('New todo!', newTodo);
		var name = newTodo.name;
		var id   = newTodo.id;  
		var item = $.render(todoTemplate, {
			name: name,
			id: id
		});
		$root.append(item);
	});

	todo.on('remove', function (todo) {
    var idFilter = '[data-id=' + todo.id + ']';
    $('#todo-list .todo-item').filter(idFilter).remove();
	});

})();