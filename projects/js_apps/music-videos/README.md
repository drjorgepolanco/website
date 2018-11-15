#Music Video Playlist Manager

See live project **[here](http://drjorgepolanco.com/js_apps/music-videos/index.html)**.

<hr>
##v1.0

####Goals
* Create a form for users to add a new video
* Display the list of videos in HTML
* Provide a link to each video

####Render the Video List
* In `index.html`, write a `video-list-item` template that interpolates a `title` variable, wrapped in a `li` tag
* In `main.js`, complete the `renderVideoList` function that:
  * Iterates over each video in the `videos` array
  * Generate new HTML for each video
  * Adds the generated html to the `#video-list` div

####Link the Video
* In `index.html`, update your `video-list-item` template so that each title has an anchor tag that links to the video's youtube page.

####Creating the Form
Create an html form for a user to add a new video list item. This form should have:

* Two `<input>` tags with `type="text"`
* An appropriate `<label>` tag for each input

Create a `submit` event handler for your new form. It should:

* Prevent the form from submitting (hint: preventDefault)
* Grab the values from the **title** and **youtube id** inputs
* Add a **new object** to the `videos` array with the new title and youtube id
* Generate the new `video-list-item` html
* Add the newly generated html to the `#video-list` div

<hr>
##v2.0

####Goals
* Adding a `genre` property to each music video

####Setting Up Test Data
* Manually type and add a `genre` property to each object in your `videos` array
* Add extra videos

####Calculating Genre Stats
* Write a `renderGenreStats` function that loops through your `videos` array and calculates the number of videos that are part of each genre.

####Displaying the Stats on the Page
* Add this div to your page:

        <div id="genre-stats"></div>
      
* Now create a template script for an individual genre count.
* Add the following code to your `renderGenreStats` function:

        for (var genre in stats) {
          var genreCount = stats[genre];
          // TODO
        }

Finish this object loop so that it:

* Generates **new html** for the current genre (using your **template script** from the previous exercise)
* Adds this new html to the `#genre-stats` div

####Updating Stats in REAL TIME

In your original form's `submit` handler, call your `renderGenreStats` function so that your stats update every time the user enters a new video with a genre.

<hr>
##v3.0

####Goals
* A video playlist is most excellent when you can view the videos on the page itself!

####The Youtube Embed Template

1. Visit any Youtube video page
2. Click the `share` tab above the description
3. Click the inner `Embed` tab
4. Copy the iframe code
5. Paste it **as a new template script** with class `video-embed`

####Detecting a Video Click
Add `data-youtube-id` attribute with the **youtube id as the value** (similar to the href) to the anchor link in your `video-list-item` template. You will need this to identify which youtube video link is being clicked.

Now create a click listener for your anchor links.

####Displaying the Video
Now that you have the youtube id, **on each click**, use your new `video-embed` template to generate new html to replace the contents of the `#video-display` div with an iframe that points to the clicked video.