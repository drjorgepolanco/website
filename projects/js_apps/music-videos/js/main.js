function capitalize(string) {
  return string.charAt(0).toUpperCase() + string.substr(1).toLowerCase();
};

var videos = [
  { title: "Iron Maiden - Wasted Years",                           youtubeId: 'GnqkDbrIfps', genre: 'metal'        },
  { title: "Blake Shelton - 'Lonely Tonight' (Ft. Ashley Monroe)", youtubeId: 'G91KZ56mNbw', genre: 'country'      },
  { title: "SODA STEREO - De musica ligera",                       youtubeId: 'PBozofUgEQ0', genre: 'spanish-rock' },
  { title: "B. B. King - The Thrill Is Gone",                      youtubeId: '4fk2prKnYnI', genre: 'blues'        },
  { title: "Michel Camilo - Caribe (Solo Intro)",                  youtubeId: 'FC9MKexsNnU', genre: 'jazz'         },
  { title: "Enanitos Verdes - Lamento Boliviano",                  youtubeId: 'khbDnLqe_Wk', genre: 'spanish-rock' },
  { title: "Chick Corea - Live at North Sea Jazz 2003",            youtubeId: 'SL34LYIWQ6M', genre: 'jazz'         },
  { title: "Art Tatum - Solo Masterpieces (Vol. 1)",               youtubeId: '1SnJSHfMAxQ', genre: 'jazz'         },
  { title: "Metallica - Nothing Else Matters",                     youtubeId: 'tAGnKpE4NCI', genre: 'metal'        }
];


// DISPLAYS VIDEO LIST
var videoTemplate = $('#templates .video-list-item').html();
var renderVideoList = function () {
  for (var i = 0; i < videos.length; i += 1) {
    var video = $.render(videoTemplate, { 
      title: videos[i].title,
      genre: videos[i].genre, 
      youtubeId: videos[i].youtubeId 
    });
    $('#video-list').append(video);
  };
};
renderVideoList();

// ADDS NEW VIDEO TO THE LIST
$('#new-video').on('submit', function (e) {
  e.preventDefault();
  var title = $('.title').val();
  var genre = $('.genre').val();
  var youtubeId = $('.youtube_id').val();
  $('.title').val('');
  $('.genre').val('');
  $('.youtube_id').val('');
  videos.push({ title: title, genre: genre, youtubeId: youtubeId});
  renderGenreStats();
  var newVideo = $.render(videoTemplate, { 
    title: title,
    genre: genre, 
    youtubeId: youtubeId
  });
  $('#video-list').prepend(newVideo);
});


// DISPLAYS VIDEO STATS
var renderGenreStats = function () {
  var stats = {};
  for (var i = 0; i < videos.length; i += 1) {
    var genre = videos[i].genre;
    if (stats[genre] === undefined)
      stats[genre] = 0;
    stats[genre] += 1;
  };
  stats;
  var genreStatTemplate = $('#templates .genre-stat').html();
  $('#genre-stats').empty();
  for (var genre in stats) {
    var genreCount = stats[genre];
    var genreStat = $.render(genreStatTemplate, { 
      genre: capitalize(genre), 
      genreCount: genreCount 
    });
    $('#genre-stats').append(genreStat);
  };
};
renderGenreStats();


// DISPLAYS FULL SIZE VIDEO ON TOP OF BROWSER
var videoDisplay = $('#templates .video-embed').html();
$(document).on('click', '.list-item-container', function (e) {
  e.preventDefault();
  var youtubeId = $(this).data('youtube-id');
  console.log('Clicked on youtube video:', youtubeId);
  var currentVideo = $.render(videoDisplay, { youtubeId: youtubeId });
  $('#video-display').empty();
  $('html, body').animate({ scrollTop: 0 }, 'fast');
  $('#video-display').append(currentVideo);
});