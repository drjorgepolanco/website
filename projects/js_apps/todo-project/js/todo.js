(function () {

	// Private variables and functions
	var counter = 0;

	var generateId = function () {
		counter += 1;
		return 'item_' + counter;
	};


	/* The Model */

	window.Todo = function () {

		$.observable(this);

		var items = [];
		var findItemById = function (id) {
			for (var i = 0; i < items.length; i += 1) {
				if (items[i].id === id)
					return i;
			}
			// if the item is not found, return -1
			return -1;
		};

		this.add = function (name) {
			var item = {
				id: generateId(),
				name: name
			};
			items.push(item);
			this.trigger('add', item);
		};

		this.remove = function (id) {
			var index = findItemById(id);
			var item = items[index];
			items.splice(index, 1);

			this.trigger('remove', item);
			return item;
		};

	};

})();