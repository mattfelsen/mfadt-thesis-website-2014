<?php
/*
Template Name: Symposium
*/

get_header();

// query all projects and sort by symposium date/time
$args = array (
	'post_type' => 'project',
	'posts_per_page' => '-1',
	'meta_key' => 'wpcf-symposium-date',
	'orderby' => 'meta_value',
'order' => 'ASC'
);
$query = new WP_Query( $args );

$data = array();
$lastGroup = "";

// build a big $data object
if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();

// Set up student/s name
$students_list = array();
$students = types_child_posts('student');
foreach ($students as $student) { $students_list[] = $student->post_title; }
$students = join(" + ", $students_list);

$group = types_render_field('symposium-group');

$array = array(
	'project' => $post->post_name,
	'name' => $students,
	'time' => types_render_field('symposium-date', array("format" => "g:ia"))
);
$data[$group][] = $array;

endwhile;
endif;

// function to spit out a listing of students for a given symposium group
function generateGroupListing($group) {
	global $data;
	foreach ($data[$group] as $student) {
	print "<a href=\"project/$student[project]\">$student[name]</a><br>\n";
	}
}

?>

<!-- html goes here -->

<div id="mfadt-symposium" class="container">

  <div class="sixteen columns below-hero-content">
    <p class="symposium-title">Location</p>
    <p class="symposium-saturday">
      Theresa Lang Student & Community Center<br>
      55 W 13th St<br>
      New York, NY 10011
    </p>
    Fri May 16  2 - 8pm<br>
    Sat May 17 12 - 7pm


    <p class="symposium-title">keynote speakers</p>
  
  </div>

  <div class="eight columns keynote-speakers">
  	  <div class="wtf-mozilla">
      <p class="symposium-keynote-speakers">Majora Carter</p>
      Majora Carter is an urban revitalization strategy consultant, real estate developer, and Peabody Award winning broadcaster.  She is responsible for the creation & successful implementation of numerous green-infrastructure projects, policies, and job training & placement systems.
	  <br><br>She’s founded Sustainable South Bronx in 2001, and co-founded Green For All soon after, among other organizations. Her consulting company, Majora Carter Group LLC, was named Best for the World, 2014 by bcorporation.net.   Her work involves unorthodox notions about urban economic developments designed to help move Americans out of poverty.
    </div>
    </div>
  <div class="eight columns keynote-speakers">
  	<div class="wtf-mozilla">
      <p class="symposium-keynote-speakers">Theo & Emily</p>
      Theo Watson is an artist, designer and experimenter. An open-source enthusiast, he works together with Zach Lieberman and Arturo Castro in the openFrameworks toolkit for creative coding. Emily Gobeille is an artist and award-winning designer who specializes in merging technology and design to create rich immersive design experiences.
	  <br><br>Theo and Emily are co-founders of Design I/O – a creative studio specializing in the design and development of cutting edge, immersive, interactive installations – pushing the boundaries of what is possible in the intersection between design and technology.
	 </div>
	 </div> 
	<div class="sixteen columns below-hero-content">
    <p class="symposium-title">panels</p>
  </div>
  <div class="four columns panels">
    <div class="wtf-mozilla">
      <p class="symposium-panel-title-storytelling">Storytelling</p>
      Conveying stories in a variety of forms, involving their audience and participants to different degrees. In some of these projects, the audience is recipient of the story; in others, the participants become a part of the narrative.
    </div>
  </div>
  <div id="panel-bigdata" class="four columns panels">
    <div class="wtf-mozilla">
      <p class="symposium-panel-title-really-big-data">Really Big Data</p>
      Tapping into the swarm of data generated by us and surrounding us, commenting on the role of the massive amount of often-hidden detail that exists.
    </div>
  </div>
  <div id="panels-play" class="four columns panels">
    <div class="wtf-mozilla">
      <p class="symposium-panel-title-play">Play</p>
      Inviting the audience to participate and explore. Some are toys that invite open-ended play; others are games with formalized rules, winning, and losing.
    </div>
  </div>
  <div id="panels-education" class="four columns panels">
    <div class="wtf-mozilla">
      <p class="symposium-panel-title-education">Education</p>
      Approaching the world of education through innovation – illuminating topics through demonstration, visualization, and participation. Some are geared toward children, while certain projects aim to broaden the knowledge of adults.
    </div>
  </div>
  <div id="panels-critical" class="four columns panels">
    <div class="wtf-mozilla">
      <p class="symposium-panel-title-critical-speculative">Critical & Speculative</p>
      Speculating over near or far future scenarios. Critiquing our world through design. Questioning current social practices or directions in which we may be moving.
    </div>
  </div>
  <div id="panels-experiential" class="four columns panels">
    <div class="wtf-mozilla">
      <p class="symposium-panel-title-experiential">Experiential</p>
      Enveloping the audience, immersing them in space and exploring the intersection of the physical and digital worlds.
    </div>
  </div>
  <div id="panels-information" class="four columns panels">
    <div class="wtf-mozilla">
      <p class="symposium-panel-title-information-instruments">Information Instruments</p>
      Conveying, managing and understanding information – presenting it to audiences in unique ways.
    </div>
  </div>
  <div id="panels-social" class="four columns panels">
    <div class="wtf-mozilla">
      <p class="symposium-panel-title-social">Social</p>
      Exploring the ways in which we connect, creating new forms of communication and collaboration.
    </div>
  </div>
<div class="sixteen columns below-hero-content">
    <p class="symposium-title-schedule">schedule</p>
  </div>
  <div class="eight columns friday">
    <div class="six columns panels">
      <div class="symposium-panel-title">
        <p class="symposium-saturday">Friday, May 16th<br>
      </div>
      <div class="symposium-panel-title-hours">
        <p class="symposium-saturday">2.00PM - 8.00PM<br>
      </div>
    </div>
    <div class="six columns panels">
      <div class="symposium-welcome">
        Opening: <br>
        Majora Carter<br>
        Break  
      </div>
      <div class="symposium-welcome-hours">
        2.00PM - 2.40PM<br><br>
        2.40PM - 2.45PM<br>
      </div>
    </div>

    <div class="six columns panels">
      <div id="experiential-1">
        <div class="symposium-panel-title">
          <p class="symposium-panel-title-experiential">Experiential 1</p>
        </div>
        <div class="symposium-panel-title-hours">
          2.45PM<br>
        </div>
        <div class="symposium-feedback-break">
          Panel respondent: Joe Saavedra<br>
        </div>
        <div class="symposium-students">
        <?php generateGroupListing("Experiential (Group 1)"); ?>
        </div>
        <div class="symposium-feedback-break-hours">
          3.33PM - 3.49PM<br>
          3.49PM - 3.54PM<br>
        </div>
      </div>
    </div>
    <div class="six columns panels">
      <div id="storytelling-2">
        <div class="symposium-panel-title">
          <p class="symposium-panel-title-storytelling">Storytelling 2</p>
        </div>
        <div class="symposium-panel-title-hours">
          3.50PM<br>
        </div>
        <div class="symposium-feedback-break">
          Panel respondent: Nick Fortugno<br>
        </div>
        <div class="symposium-students">
          <?php generateGroupListing("Storytelling (Group 2)"); ?>
        </div>
        <div class="symposium-feedback-break-hours">
          4.26PM - 4.36PM<br>
          4.36PM - 4.41PM<br>
        </div>
      </div>
    </div>
    <div class="six columns panels">
      <div id="really-big-data">
        <div class="symposium-panel-title">
          <p class="symposium-panel-title-really-big-data">Really Big Data</p>
        </div>
        <div class="symposium-panel-title-hours">
          4.40<br>
        </div>
        <div class="symposium-feedback-break">
          Panel respondent: Jen Lowe<br> 
        </div>
        <div class="symposium-students">
          <?php generateGroupListing("Really Big Data"); ?>
        </div>
        <div class="symposium-feedback-break-hours">
          5.03PM - 5.11PM<br>
          5.11PM - 5.14PM<br>
        </div>
      </div>
    </div>
    <div class="six columns panels">
      <div id="play-1">
        <div class="symposium-panel-title">
          <p class="symposium-panel-title-play">Play 1</p>
        </div>
        <div class="symposium-panel-title-hours">
          5.15PM<br>
        </div>
        <div class="symposium-feedback-break">
          Panel respondent: Ramsey Nasser<br>
        </div>
        <div class="symposium-students">
          <?php generateGroupListing("Play (Group 1)"); ?>
        </div>
        <div class="symposium-feedback-break-hours">
          5.44PM - 5.54PM<br>
          5.54PM - 6.01PM<br>
        </div>
      </div>
    </div>
    <div class="six columns panels">
      <div id="play-2">
        <div class="symposium-panel-title">
          <p class="symposium-panel-title-play">Play 2</p>
        </div>
        <div class="symposium-panel-title-hours">
          6.00PM<br>
        </div>
        <div class="symposium-feedback-break">
          Panel respondent: Chloe Varelidi<br>
        </div>
        <div class="symposium-students">
          <?php generateGroupListing("Play (Group 2)"); ?>
        </div>
        <div class="symposium-feedback-break-hours">
          6.32PM - 6.42PM<br>
          6.42PM - 6.47PM<br>
        </div>
      </div>
    </div>
    <div class="six columns panels">
      <div id="education">
        <div class="symposium-panel-title">
          <p class="symposium-panel-title-education">Education</p>
        </div>
        <div class="symposium-panel-title-hours">
          6.45PM<br>
        </div>
        <div class="symposium-feedback-break">
          Panel respondent: Sara Chipps<br>
        </div>
        <div class="symposium-students">
          <?php generateGroupListing("Education"); ?>
        </div>
        <div class="symposium-feedback-break-hours">
          7.27PM - 7.43PM<br>
        </div>
      </div>
    </div>
  </div>

  <div class="eight columns saturday">
  <div class="srsly-mozilla-wtf">
    <div class="six columns panels">
      <div class="symposium-panel-title">
        <p class="symposium-saturday">Saturday, May 17th<br>
      </div>
      <div class="symposium-panel-title-hours">
        <p class="symposium-saturday">12.00PM - 7.00PM<br>
      </div>
    </div>
   </div>
   <div class="srsly-mozilla-wtf">
    <div class="six columns panels">
      <div class="symposium-welcome">
        Welcome<br>
        Break  
      </div>
      <div class="symposium-welcome-hours">
        12.00PM - 12.10PM<br>
        12.10PM - 12.15PM<br>
      </div>
    </div>
   </div>
   <div class="srsly-mozilla-wtf">
    <div class="six columns panels">
      <div id="critical-speculative-1">
        <div class="symposium-panel-title">
          <p class="symposium-panel-title-critical-speculative">Critical & Speculative 1</p>
        </div>
        <div class="symposium-panel-title-hours">
          12.15PM<br>
        </div>
        <div class="symposium-feedback-break">
          Panel respondent: Julia Kaganskiy<br>
        </div>
        <div class="symposium-students">
          <?php generateGroupListing("Critical & Speculative (Group 1)"); ?>
        </div>
        <div class="symposium-feedback-break-hours">
          12.51PM - 1.03PM<br>
          1.03PM - 1.08PM<br>
        </div>
      </div>
    </div>
   </div>
   <div class="srsly-mozilla-wtf">
    <div class="six columns panels">
      <div id="critical-speculative-2">
        <div class="symposium-panel-title">
          <p class="symposium-panel-title-critical-speculative">Critical & Speculative 2</p>
        </div>
        <div class="symposium-panel-title-hours">
          1.05PM<br>
        </div>
        <div class="symposium-feedback-break">
          Panel respondent: Ted Byfield<br>
        </div>
        <div class="symposium-students">
          <?php generateGroupListing("Critical & Speculative (Group 2)"); ?>
        </div>
        <div class="symposium-feedback-break-hours">
          1.50PM - 2.04PM<br>
          2.04PM - 2.09PM<br>
        </div>
      </div>
    </div>
   </div>
   <div class="srsly-mozilla-wtf">
    <div class="six columns panels">
      <div id="storytelling-1">
        <div class="symposium-panel-title">
          <p class="symposium-panel-title-storytelling">Storytelling 1</p>
        </div>
        <div class="symposium-panel-title-hours">
          2.10PM<br>
        </div>
        <div class="symposium-feedback-break">
          Panel respondent: Brett Renfer<br>
        </div>
        <div class="symposium-students">
          <?php generateGroupListing("Storytelling (Group 1)"); ?>
        </div>
        <div class="symposium-feedback-break-hours">
          2.39PM - 2.49PM<br>
          2.49PM - 2.54PM<br>
        </div>
      </div>
    </div>
   </div>
   <div class="srsly-mozilla-wtf">
    <div class="six columns panels">
      <div id="experiential-2">
        <div class="symposium-panel-title">
          <p class="symposium-panel-title-experiential">Experiential 2</p>
        </div>
        <div class="symposium-panel-title-hours">
          2.55PM<br>
        </div>
        <div class="symposium-feedback-break">
          Panel respondent: Ryan Raffa<br>
        </div>
        <div class="symposium-students">
          <?php generateGroupListing("Experiential (Group 2)"); ?>
        </div>
        <div class="symposium-feedback-break-hours">
          3.42PM - 3.58PM<br>
          3.58PM - 4.03PM<br>
        </div>
      </div>
    </div>
   </div>
   <div class="srsly-mozilla-wtf">
    <div class="six columns panels">
      <div id="information-instruments">
        <div class="symposium-panel-title">
          <p class="symposium-panel-title-information-instruments">Information Instruments</p>
        </div>
        <div class="symposium-panel-title-hours">
          4.00PM<br>
        </div>
        <div class="symposium-feedback-break">
          Panel respondent: Manuel Lima<br>
        </div>
        <div class="symposium-students">
          <?php generateGroupListing("Information Instruments"); ?>
        </div>
        <div class="symposium-feedback-break-hours">
          4.51PM - 5.07PM<br>
          5.07PM - 5.12PM<br>
        </div>
      </div>
    </div>
   </div>
   <div class="srsly-mozilla-wtf">
    <div class="six columns panels">
      <div id="social">
        <div class="symposium-panel-title">
          <p class="symposium-panel-title-social">Social</p>
        </div>
        <div class="symposium-panel-title-hours">
          5.10PM<br>
        </div>
        <div class="symposium-feedback-break">
          Panel respondent: Liz Filardi<br>
        </div>
        <div class="symposium-students">
          <?php generateGroupListing("Social"); ?>
        </div>
        <div class="symposium-feedback-break-hours">
          5.52PM - 5.56PM<br>
          5.58PM - 6.03PM<br>
        </div>
      </div>
    </div>
   </div>
   <div class="srsly-mozilla-wtf">
    <div class="six columns panels">
      <div class="symposium-welcome">
        Closing:<br>
        Emily Gobeille and<br> Theo Watson
      </div>
      <div class="symposium-welcome-hours">
        6.07PM - 7.00PM
      </div>
    </div>
  </div>
 </div>
</div>


<?php get_footer(); ?>
