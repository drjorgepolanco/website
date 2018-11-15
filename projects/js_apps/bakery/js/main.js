function capitalize(string) {
  return string.charAt(0).toUpperCase() + string.substr(1).toLowerCase();
};

var bakery = {
  supplies: {
    flour: 30,
    eggs: 36,
    sugar: 47,
    chocolate: 23,
    salt: 13,
    butter: 35,
    nuts: 32,
    nutella: 14,
    liqueur: 22,
    marsala: 28,
    cream: 31,
    cocoa: 17,
    soda: 34,
    coloring: 23,
    cinnamon: 27
  },
  goodRequirements: {
    cupcake: {
      flour: 2,
      eggs: 1,
      sugar: 1, 
      butter: 1,
      nuts: 3,
      nutella: 1
    },
    cookie: {
      flour: 1,
      eggs: 1,
      sugar: 2,
      butter: 1,
      chocolate: 2,
      salt: 0.5
    },
    tiramisu: {
      eggs: 1,
      marsala: 0.5,
      liqueur: 3,
      sugar: 3,
      cream: 2,
      cocoa: 1
    },
    red_velvet: {
      eggs: 1,
      sugar: 2,
      soda: 1,
      cocoa: 1,
      salt: 0.5,
      cream: 1,
      butter: 1,
      nuts: 2,
      coloring: 1
    },
    pumpkin_pie: {
      eggs: 1,
      sugar: 2,
      cinnamon: 1,
      salt: 0.5,
      cream: 1,
      butter: 1,
      nuts: 2
    }
  },
  make: function (goodType) {
    console.log('Attempting to make a:', goodType);
    var req = this.goodRequirements[goodType];

    for (var i in req) {
      if (this.supplies[i] >= req[i]) {
        this.supplies[i] -= req[i];
        this.updateIngredientsList();
      }
      else {
        alert("This " + goodType + " won't have " + i);
      }
    };
    console.log('The bakery made a ' + goodType + '!');

    var goodDiv = $('<div>').addClass(goodType);
    $('.bakery .display').append(goodDiv);
    console.log(this.supplies);
  },
  updateIngredientsList: function () {
    for (ingredient in this.supplies) {
      $('.ingredients .' + ingredient + ' span').text(this.supplies[ingredient]);
    }
  },
  setIngredientsList: function () {
    for (ingredient in this.supplies) {
      $('.ingredients').append('<li class="' + ingredient + '">' + capitalize(ingredient) + 
        ": <span>" + this.supplies[ingredient] + "</span></li>");
    }
  }
};

$('.bakery .make').on('click', function (e) {
  var goodType = $(e.currentTarget).data('good-type');
  bakery.make(goodType);
});

bakery.setIngredientsList();