<?php
/**

 * THE PLUGIN BOOTSTRAP FILE

 *

 * THIS FILE IS READ BY WORDPRESS TO GENERATE THE PLUGIN INFORMATION IN THE PLUGIN

 * ADMIN AREA. THIS FILE ALSO INCLUDES ALL OF THE DEPENDENCIES USED BY THE PLUGIN,

 * REGISTERS THE ACTIVATION AND DEACTIVATION FUNCTIONS, AND DEFINES A FUNCTION

 * THAT STARTS THE PLUGIN.

 *

 * @LINK              HTTPS://MICHAELWIMMENAUER.COM

 * @SINCE             2.1.3

 * @PACKAGE           RANDOM_SENTENCE_GENERATOR

 *

 * @WORDPRESS-PLUGIN

 * PLUGIN NAME:       Random Sentence Generator

 * PLUGIN URI:        HTTP://METRIKCORP.COM

 * DESCRIPTION:       Displays a Random Sentence when a visitor clicks on a button. Add the shortcode [RSG] to any page or post to display. This plugin has 500 different Verbs, Nouns, Adjectives, Adverbs, and Prepositions to make randomly generated sentences, It also has 100 top gamer quotes that will randomly generate to alternat randomly between them.

 * VERSION:           2.1.3

 * AUTHOR:            Michael W

 * AUTHOR URI:        HTTPS://MICHAELWIMMENAUER.COM

 * LICENSE:           GPL-2.0+

 * LICENSE URI:       HTTP://WWW.GNU.ORG/LICENSES/GPL-2.0.TXT

 * TEXT DOMAIN:       Random-Sentence-Generator

 * DOMAIN PATH:       /LANGUAGES

 */

 /* ENVIRONMENT: WE'RE IN FUNCTIONS.PHP OR A PHP FILE IN A PLUGIN */
if ( ! defined( 'WPINC' ) ) {
    die;
}
add_shortcode( 'RSG','RSG_function');

//Start of display RSG on pages or post Function
function RSG_function(){
    $p ='';
     $p.='
     <style>
        #box{  
        width:auto;
        background:black;
        color:white;
        border-radius:25px;
        box-shadow:2px 2px 5px black;
        padding:5px 5px 5px 5px;
        text-align:center;
        }
        .boxh{
        font-size:30px;
        text-shadow:1px 1px 4px white;
        }
        .boxp{
        font-size:20px;
        text-shadow:1px 1px 4px white;
        }
        button{
        border-radius:25px;
        background-color:red;
        }
        .button1{
        border-radius:25px!important;
        background-color:red!important;
        }
        #text{
            color:green!important;
        }
     </style>
     <div id="box">
        <h2 class="boxh"> Random Sentence Generator</h2>
        <p class="boxp"><button onclick="sentence()">Generate Sentence<i class="fa fa-refresh" aria-hidden="true"></i></button></p>
        <p class="boxp" id="sentence"></p>
     </div>
     <script>
var verbs, nouns, adjectives, adverbs, preposition;
            nouns = ["time", "year", "people", "way", "day", "man", "thing", "woman", "life", "child", "world", "school", "state", "family", "student", "group", "country", "problem", "hand", "part", "place", "case", "week", "company", "system", "program", "question", "work", "government", "number", "night", "point", "home", "water", "room", "mother", "area", "money", "story", "fact", "month", "lot", "right", "study", "book", "eye", "job", "word", "business", "issue", "side", "kind", "head", "house", "service", "friend", "father", "power", "hour", "game", "line", "end", "member", "law", "car", "city", "community", "name", "president", "team", "minute", "idea", "kid", "body", "information", "back", "parent", "face", "others", "level", "office", "door", "health", "person", "art", "war", "history", "party", "result", "change", "morning", "reason", "research", "girl", "guy", "moment", "air", "teacher", "force", "education"];
            verbs = ["to be", "to have", "to do", "to say", "to go", "to get", "to make", "to know", "to think", "to take", "to see", "to come", "to want", "to look", "to use", "to find", "to give", "to tell", "to work", "to call", "to try", "to ask", "to need", "to feel", "to become", "to leave", "to put", "to mean", "to keep", "to let", "to begin", "to seem", "to help", "to talk", "to turn", "to start", "to show", "to hear", "to play", "to run", "to move", "to like", "to live", "to believe", "to hold", "to bring", "to happen", "to write", "to provide", "to sit", "to stand", "to lose", "to pay", "to meet", "to include", "to continue", "to set", "to learn", "to change", "to lead", "to understand", "to watch", "to follow", "to stop", "to create", "to speak", "to read", "to allow", "to add", "to spend", "to grow", "to open", "to walk", "to win", "to offer", "to remember", "to love", "to consider", "to appear", "to buy", "to wait", "to serve", "to die", "to send", "to expect", "to build", "to stay", "to fall", "to cut", "to reach", "to remove", "to remain", "to suggest", "to raise", "to pass", "to sell", " to require", "to report", "to decide", "to pull"];
            adjectives = ["angry", "bad", "big", "bitter", "green", "bland", "bloody", "blue", "bold", "bossy", "brave", "brief", "bright", "broad", "busy", "calm", "cheap", "chewy", "chubby", "classy", "clean", "clear", "clever", "close", "cloudy", "clumsy", "busy", "calm", "coarse", "cold", "cool", "crazy", "creamy", "creepy", "crispy", "cruel", "crunchy", "curly", "curvy", "cute", "damp", "dark", "brief", "deep", "dense", "dirty", "dry", "dull", "dumb", "dusty", "early", "easy", "faint", "fair", "fancy", "fat", "few", "fierce", "filthy", "fine", "firm", "fit", "flaky", "flat", "fresh", "friendly", "full", "funny", "gentle", "hip", "hot", "humble", "hungry", "icy", "itchy", "juicy", "kind", "large", "late", "lazy", "light", "likely", "little", "nice", "noisy", "odd", "oily", "old", "plain", "polite", "poor", "pretty", "proud", "pure", "quick", "quiet", "sincere", "skinny", "sleepy", "slim"];
            adverbs = ["up", "so", "out", "just", "now", "how", "then", "more", "also", "here", "well", "only", "very", "even", "back", "there", "down", "still", "in", "as", "to", "when", "never", "really", "most", "on", "why", "about", "over", "again", "where", "right", "off", "always", "today", "all", "far", "long", "away", "yet", "often", "ever", "however", "almost", "later", "much", "once", "least", "ago", "together", "around", "already", "enough", "both", "maybe", "actually", "probably", "home", "of course", "perhaps", "little", "else", "sometimes", "finally", "less", "better", "early", "especially", "either", "quite", "simply", "nearly", "soon", "certainly", "quickly", "no", "recently", "before", "usually", "thus", "exactly", "hard", "particularly", "pretty", "forward", "ok", "clearly", "indeed", "rather", "that", "tonight", "close", "suddenly", "best", "instead", "ahead", "fast", "alone", "eventually", "directly"];
            preposition = ["about", "above", "according to", "across", "after", "against", "ago", "ahead of", "along", "amidst", "among", "amongst", "apart", "around", "as", "as far as", "as well as", "aside", "at", "away", "because of", "before", "behind", "below", "beneath", "beside", "besides", "between", "beyond", "by", "by means of", "by way of", "blose to", "despite", "down", "due to", "during", "except", "for", "from", "hence", "in", "in accordance with", "in addition to", "in case of", "in front of", "in lieu of", "in place of", "in regard to", "in spite of", "in to", "inside", "instead of", "into", "like", "near", "next", "next to", "notwithstanding", "of", "off", "on", "on account of", "on behalf of", "on to", "on top of", "onto", "opposite", "out", "out from", "out of", "outside", "over", "owing to", "past", "per", "prior to", "round", "since", "than", "through", "throughout", "till", "to", "toward", "towards", "under", "underneath", "unlike", "until", "unto", "up", "upon", "via", "with", "with a view to", "within", "without", "worth", "aside"];
             preposition2 = ["About", "Above", "According to", "Across", "After", "Against", "Ago", "Ahead of", "Along", "Amidst", "Among", "Amongst", "Apart", "Around", "As", "As far as", "As well as", "Aside", "At", "Away", "Because of", "Before", "Behind", "Below", "Beneath", "Beside", "Besides", "Between", "Beyond", "By", "By means of", "By way of", "Close to", "Despite", "Down", "Due to", "During", "Except", "For", "From", "Hence", "In", "In accordance with", "In addition to", "In case of", "In front of", "In lieu of", "In place of", "In regard to", "In spite of", "In to", "Inside", "Instead of", "Into", "Like", "Near", "Next", "Next to", "Notwithstanding", "Of", "Off", "On", "On account of", "On behalf of", "On to", "On top of", "Onto", "Opposite", "Out", "Out from", "Out of", "Outside", "Over", "Owing to", "Past", "Per", "Prior to", "Round", "Since", "Than", "Through", "Throughout", "Till", "To", "Toward", "Towards", "Under", "Underneath", "Unlike", "Until", "Unto", "Up", "Upon", "Via", "With", "With a view to", "Within", "Without", "Worth", "Aside"];
             gameQ = ["We all make choices in life, but in the end our choices make us.","Get over here!","What is better? To be born good or to overcome your evil nature through great effort?","The right man in the wrong place can make all the difference in the world.","Stand in the ashes of a trillion dead souls, and asks the ghosts if honor matters. The silence is your answer.","Bring me a bucket, and Ill show you a bucket!","Wanting something does not give you the right to have it.","Even in dark times, we cannot relinquish the things that make us human.","How many are there in you? Whose hopes and dreams do you encompass? Could you but see the eyes in your own, the minds in your mind, you would see how much we share.","How many are there in you? Whose hopes and dreams do you encompass? Could you but see the eyes in your own, the minds in your mind, you would see how much we share.","Its a funny thing, ambition. It can take one to sublime heights or harrowing depths. And sometimes they are one and the same.","A hero need not speak. When he is gone, the world will speak for him.","No gods or kings. Only man.","Some trees flourish, others die. Some cattle grow strong, others are taken by wolves. Some men are born rich enough and dumb enough to enjoy their lives. Aint nothing fair.","You cant break a man the way you break a dog, or a horse. The harder you beat a man, the taller he stands.","Its time to kick ass and chew bubblegum... and Im all outta gum.","Life is cruel. Of this I have no doubt. One can only hope that one leaves behind a lasting legacy. But so often, the legacies we leave behind... are not the ones we intended.","...","If our lives are already written, it would take a courageous man to change the script.","Its easy to forget what a sin is in the middle of a battlefield.","You know, being Caroline taught me a valuable lesson. I thought you were my greatest enemy, when all along you were my best friend. The surge of emotion that shot through me when I saved your life taught me an even more valuable lesson  where Caroline lives in my brain.","The courage to walk into the Darkness, but strength to return to the Light.","Who are you, that do not know your history?","Dont wish it were easier, wish you were better.","The world fears the inevitable plummet into the abyss. Watch for that moment and when it comes, do not hesitate to leap. It is only when you fall that you learn whether you can fly.","Most test subjects do experience some cognitive deterioration after a few months in suspension. Now youve been under for... quite a lot longer, and its not out of the question that you might have a very minor case of serious brain damage. But dont be alarmed, alright? Although, if you do feel alarm, try to hold onto that feeling because that is the proper reaction to being told you have brain damage.","Trust me.","If history only remembers one in a thousands of us, then the future will be filled with stories of who we were and what we did.","Were made up of thousands of parts with thousands of functions all working in tandem to keep us alive. Yet if only one part of our imperfect machine fails, life fails. It makes one realize how fragile, how flawed we are.","Nothing is true, everything is permitted.","Nothing is more badass than treating a woman with respect!","Good men mean well. We just dont always end up doing well.","Its dangerous to go alone, take this!","War. War never changes.","AAAAAAAAAAAAHHHRHGHHHGH thump","The best solution to a problem is usually the easiest one. And Ill be honest - killing you is hard. You know what my days used to be like? I just tested. Nobody murdered me, or put me in a potato, or fed me to birds. I had a pretty good life. And then you showed up. You dangerous, mute lunatic. So you know what? You win. Just go. [chuckles] Its been fun. Dont come back.","Boss... you were right. Its not about changing the world. Its about doing our best to leave the world... the way it is. Its about respecting the will of others, and believing in your own.","Often when we guess at others motives, we reveal only our own.","Endure and survive.","Death is inevitable. Our fear of it makes us play safe, blocks out emotion. Its a losing game. Without passion, you are already dead.","...","You gave them the one thing that was stolen from them. A chance. A chance to learn. To find love. To live. And in the end what was your reward? You never said. But I think I know: a family.","Protocol one: link to Pilot. Protocol two: uphold the mission. Protocol three: protect the Pilot.","You are here, and its beautiful, and escaping isnt always something bad.","You cant undo what youve already done, but you can face up to it.","I miss the internet","Life is all about resolve. Outcome is secondary.","Stay awhile, and listen!","Thank you Mario! But our Princess is in another castle!","Its a-me, Mario!","I WILL KILL YOUR DICKS!","What is a man? A miserable little pile of secrets.","My brothers and sisters... I will see you again. Someday. Youve given them back to me.","...*cocks shotgun*","Finish him!","A man chooses; a slave obeys.","We both said a lot of things that youre going to regret. But I think we can put our differences behind us. For science. You monster.","Snake? Snake? SNAAAAAAAAKE!!!","Wake me when you need me.","Grass grows, birds fly, sun shines, and brother, I hurt people.","Requiescat in pace.","Every puzzle has an answer.","Hey! Listen!","I used to be an adventurer like you, until I took an arrow to the knee.","Its super effective!","The Kid just rages for a while.","Space. Space. Im in space. SPAAAAAAACE!","The ending isnt any more important than any of the moments leading to it.","Do a barrel roll!","Im rackin my brain trying to think of a name for that diamond pony I bought. I was gonna call it piss-for-brains in honor of you, but that just feels immature. Maybe... Butt Stallion?","No matter how dark the night, morning always comes, and our journey begins anew.","Hope is what makes us strong. It is why we are here. It is what we fight with when all else is lost.","A sword wields no strength unless the hands that holds it has courage.","Steel wins battles. Gold wins wars.","War. War never changes. But men do, through the roads they walk.","Science isnt about why! Its about why not!","Stop right there, criminal scum!","There was a HOLE here. Its gone now.","I dont want to set the world on fire...","Hard to see big picture behind pile of corpses.","Tell me Bats. What are you really scared of? Failing to save this cesspool of a city? Not finding the Commissioner in time? Me, in a thong?","Does this unit have a soul?","You are not a good person. You know that, right? Good people dont end up here.","Federico: It is a good life we lead, brother. Ezio: The best. May it never change. Federico: And may it never change us.","I raised you, and loved you, Ive given you weapons, taught you techniques, endowed you with knowledge. Theres nothing more for me to give you. All thats left for you to take is my life.","Its more important to master the cards youre holding than to complain about the ones your opponents were dealt.","The price of freedom is eternal vigilance.","Are you a boy or a girl?","Lotta people been askin why my voice bleeps all the time. The Torgue Shareholders wired my voicebox witha digital censor so I cant say stuff like sh*t, c*ck, or p*ssy f*ckin d*ckballs! Thats half my f*ckin vocabulary; Its goddamn bullsh*t!","War is where the young and stupid are tricked by the old and bitter into killing each other.","What is a man but the sum of his memories? We are the stories we live! The tales we tell ourselves!","When life gives you lemons, dont make lemonade. Make life take the lemons back! Get mad! I dont want your damn lemons! What am I supposed to do with these?! Demand to see lifes manager! Make life rue the day it thought it could give Cave Johnson lemons! Do you know who I am?! Im the man whos gonna burn your house down! With the lemons! Im gonna get my engineers to invent a combustible lemon that burns your house down!","Praise the sun!","Send me out...with a bang.","You have died of dysentery.","Batman: You want to know something funny? Even after everything youve done, I would have saved you. The Joker: [laughs, coughs] Actually, that is pretty funny.","Do you like hurting other people?","YOU DIED","Ghost: This path should lead us straight to the grave. [pause] Ghost: The Worlds Grave. Not ours.","Ive struggled a long time with survivin, but no matter what you have to find something to fight for."];
            function randGen() {
              return Math.floor(Math.random() * 10);
            }
            function sentence() {
              var rand1 = Math.floor(Math.random() * 100);
              var rand2 = Math.floor(Math.random() * 100);
              var rand3 = Math.floor(Math.random() * 100);
              var rand4 = Math.floor(Math.random() * 100);
              var rand5 = Math.floor(Math.random() * 100);
              var rand6 = Math.floor(Math.random() * 100);
              var rand7 = Math.floor(Math.random() * 100);
              var rand8 = Math.floor(Math.random() * 2)
              //                var randCol = [rand1,rand2,rand3,rand4,rand5];
              //                var i = randGen();
              /*
              var content = "The " + nouns[rand1] + " " + adverbs[rand1] + " was " + adjectives[rand1] + " " + preposition[rand1] + " " + nouns[rand2] + " " + verbs[rand4] + "." ;
              */
              var content = preposition2[rand1] + " the " + adjectives[rand1] + " " + nouns[rand2] + " " + adverbs[rand3] + ", we have " + verbs[rand4] + " " + nouns[rand1] + ", " + adverbs[rand1] + " " + verbs[rand1] + " " + preposition[rand2] + " " + adjectives[rand2] + " " + nouns[rand5] + " " + adjectives[rand3] + " " + adjectives[rand4] + " " + nouns[rand6] + ".";
              var content1 = gameQ[rand7];
              smashup = [content, content1];
              var newcontent = smashup[rand8];
              document.getElementById("sentence").innerHTML = "&quot;" + newcontent + "&quot;";
            };
            sentence();
</script>
     ';
     return $p;
}
//END of display RSG on pages or post using shortcode

// Start to Menu Function
function rsg_menus(){
    add_menu_page('Random Sentence Generator','Random Sentence Generator',
        'manage_options','random-sentence-generator-dashboard','rsg_render_menu_page',
        'dashicons-portfolio');
    add_submenu_page('random-sentence-generator-dashboard','Menu Settings','Setting',
    'manage_options','random-sentence-generator-settings','rsg_render_settings_page');
    add_submenu_page(null,'Edit Sentence','Edit Sentence',
    'manage_options','rsg-edit-sentence','rsg_render_edit_sentence');
}

// Start to Sentence Edit Function
function rsg_render_edit_sentence(){
    $id =  $_GET['id'];
    $o = ""; // output
    $message = "";
    $email = rsg_get_sentence_by_id($id); // check out this function
    $navyes = "<a class='page-title-action' href='".menu_page_url('random-sentence-generator-dashboard',false)."'>Go to dashboard</a>
    <a class='page-title-action' href='".menu_page_url('random-sentence-generator-settings',false)."'>Go to setting</a>
    ";
    $o .="
    <div class='wrap'>
        <h1>Update Sentence </h1>
        " . $navyes . "
        <hr>
        ";
    $o .="
        <form method='post' action='".menu_page_url('rsg-edit-sentence',false)."&id=$id'><table class='form-table'>
        <tr>
            <th><label>Email</label></th>
            <td><input name='rsg_email' type='text' value='$email'/>
            <input type='hidden' name='rsg_id' value='$id'/></td>
        </tr>
        </table>
        <p class='submit'>
        <input type='submit' name='rsg-update-sentence' id='submit' class='button button-primary' value='Save the form'></p>
        </form>
        </div>";
    echo $o;
}

// Start to sentence fetch Function
function rsg_get_sentence_by_id( $id ){
    global $wpdb;
    $sql = "SELECT * from wp_rsg_sentence WHERE sub_id=". $id;
    $results = $wpdb->get_row($sql,ARRAY_A);
    return $results["email"];
}

//Start to get sentence list Function
function rsg_get_list_sentence(){
    global $wpdb;
    $sql = "SELECT * from wp_rsg_sentence";
    $results = $wpdb->get_results($sql,ARRAY_A);
    return $results;
}


// Start to Settings page in submenu Function
function rsg_add_option(){
    register_activation_hook(__FILE__,'rsg_add_option'); // run on plugin activate
    if( get_option('rsg_plugin_options') === false ){
        add_option('rsg_plugin_options', [
            'api_code' => '9sLDw9QknN'
        ]);
    }
    rsg_create_sentence_table(); // run this query
}

// Start to Settings page display Function
function rsg_render_settings_page(){
    $api = get_option('rsg_plugin_options')['api_code'];
    if(isset($_POST['rsg-api-key-form'])){
    $new_api_key = sanitize_text_field($_POST['rsg_api_key_option']);
    if(!empty($new_api_key)){
        update_option('rsg_plugin_options',['api_code'=>$new_api_key]);
    }
    }
    $navys = "<a class='page-title-action' href='".menu_page_url('random-sentence-generator-dashboard',false)."'>Go to dashboard</a>";
    echo "
    <div class='wrap'>
        <h1>Random Sentence Generator Settings Page</h1>
        " . $navys . "<hr>
        <form method='post' action='".menu_page_url('random-sentence-generator-settings',false)."'><table class='form-table'>
        <tr>
            <th><label>Api Key</label></th>
            <td><input name='rsg_api_key_option' type='text' value='$api' title='Coming Soon!'/></td>
        </tr>
        </table>
        <p class='submit'>
        <input type='submit' name='rsg-api-key-form' id='submit' class='button button-primary' value='Save the form' title='Coming Soon!'></p>
        </form>
        </div>";
}

// Start to sentence save Function
function rsg_save_sentence($email){
    global $wpdb;
    $wpdb->insert('wp_rsg_sentence',[
        'email' => $email
    ]);
}
 
//Start to add submenu to admin dashboard Function
function register_my_custom_submenu_page() {
    add_submenu_page(
        'tools.php',
        'Submenu Page',
        'My Custom Submenu Page',
        'manage_options',
        'my-custom-submenu-page',
        'my_custom_submenu_page_content' );
}

// Start to DB Table Creation
function rsg_create_sentence_table(){
    global $wpdb;
    $sub_table = 'CREATE TABLE IF NOT EXISTS `wp_rsg_sentence` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(165) DEFAULT NULL,
  `apikey` varchar(165) DEFAULT NULL,
  `rsg_htcolor_option` varchar(165) DEFAULT NULL,
  `rsg_btcolor_option` varchar(165) DEFAULT NULL,
  `rsg_qtcolor_option` varchar(165) DEFAULT NULL,
  `rsg_bgcolor_option` varchar(165) DEFAULT NULL,
  `rsg_bbgcolor_option` varchar(165) DEFAULT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;';
    $wpdb->query( $sub_table );
}

// Start to dashboard page display Function
add_action('admin_menu', 'rsg_menus');
function rsg_render_menu_page(){
    wp_enqueue_style('load-my-styles',plugins_url( '/public/rsgstyles.css', __FILE__ )
    ,array(),'1.0');
    $o = "";
     $navyd = "<a class='page-title-action' href='".menu_page_url('random-sentence-generator-settings',false)."'>Go to settings</a>";
    $o .= "<div class='wrap'>
        <h1>Random Sentence Generator Dashboard</h1>
        <br>
        <a class='' href='".menu_page_url('random-sentence-generator-settings',false)."'><button>Go to settings</button></a>
        <p>We can create content here</p>
        <form method='post' action='".menu_page_url('random-sentence-generator-dashboard',false)."'><table class='form-table'>
                <tr>
                    <th><label>Tutorial Name</label></th>
                    <td><input name='tutorial_name' type='text'/></td>
                </tr>
                <tr>
                    <th><label>Tutorial Description</label></th>
                    <td><input name='tutorial_description' type='text'/></td>
                </tr>
            </table>
            <p class='submit'>
            <input type='submit' name='rsg-menu-form' id='submit' class='button button-primary' value='Save the form'></p>
        </form>
        ";
        $o = "";
    $message = "";
    if(isset($_POST['rsg-menu-form'])){
    }
    $data = rsg_get_list_sentence();
    wp_enqueue_script('hello-world-style', plugins_url( '/public/rsgscript.js', __FILE__ ),
    array( 'jquery' ), '1.0');
    $A = "";
    if(isset($_POST['rsg_sentence_form'])){
        $email = isset($_POST['rsg_email_form_value']) ? $_POST['rsg_email_form_value'] : null;
        if($email){
            rsg_save_sentence($email); // save the email
            $A .= "<div id='message' class='updated notice is-dismissible'><p>The sentence has been submitted!</p></div>";
        }
    }
    $A.= "
    <h1 class='boxh'> Random Sentence Generator Dashboard</h1>
    " . $navyd . "
    <hr>
    <h2>How To Use RSG?</h2>
    <p>Step 1: add the shortcode [RSG] to any page or post.</p>
    <p>Thats it! Go check out the live page or post to see RSG in action!</p>
    <hr>
    <h2 class='boxh'> Random Sentence Generator User Addon</h2>
    <form method='post'>
        <label>Enter your sentence here</label>
        <input type='text' name='rsg_email_form_value' placeholder='Enter sentence' title='Coming Soon!'/><br>
        <input class='button1' type='submit' value='Submit' title='Add you own custom sentence!'/>
        <input class='button1' id='clear-button' type='button' value='Clear' title='Coming Soon!'/>
        <input type='hidden' name='rsg_sentence_form' value='dasfasdf'/>
    </form><hr>";
    echo $A;
    $o .= "<div class='wrap'>
        <h2>List of user added sentences</h2>
        <p>Showing a list of user added sentences</p>
        <table style='width:100%' class='mytable display wp-list-table widefat fixed'>";
    $o .= "<thead><tr><td>ID</td><td>Sentence</td><td>Actions</td></tr></thead>";
    $o .= '</tr>';
    foreach ($data as $row){
        $o .= "<tr>";
        $o .="<td>".$row["sub_id"]."</td>";
        $o .="<td>".$row["email"]."</td>";
        $o .="<td>
                | <form style='display: inline' action='".menu_page_url('random-sentence-generator-dashboard',false)."' method='post' id='delete".$row['sub_id']."'>
                    <a href='javascript:void()' onclick='document.getElementById(\"delete".$row["sub_id"]."\").submit()' class='trash'>Delete</a>
                    <input type='hidden' name='rsg_sentence' value='".$row["sub_id"]."'/>
                  </form></td>";
        $o .= "</tr>";
        if(isset($_POST['rsg_sentence'])){
            $id = $_POST['rsg_sentence'];
            rsg_delete_sentence_by_id($id); // take note of this function
            echo '<div id="message" class="updated notice is-dismissible"><p>The sentence has been deleted</p></div>';
        }
    }
    if(isset($_POST['rsg-update-sentence'])){
        $newEmail = $_POST["rsg_email"];
        rsg_update_sentence_by_id($id, $newEmail); // check out this function
        $email = rsg_get_sentence_by_id($id);
        $message = '<div id="message" class="updated notice is-dismissible"><p>The email has been updated</p></div>';
    }
    echo $o;
    if(isset($_POST['rsg-menu-form'])){
        $name = isset($_POST['tutorial_name']) ? $_POST["tutorial_name"] : null;
        $details = isset($_POST['tutorial_description']) ? $_POST["tutorial_description"] : null;
        $message ="<div style='padding: 5px; border: 1px solid red;'>You submitted a tutorial with name: $name and details: $details</div>";}
    }

// Start to sentence delete Function
function rsg_delete_sentence_by_id( $id ){
    global $wpdb;
    $wpdb->query("DELETE FROM wp_rsg_sentence WHERE sub_id=". $id);
}

// Start to sentence update Function
function rsg_update_sentence_by_id($id, $email){
    global $wpdb;
    $wpdb->update('wp_rsg_sentence',[
        'email' => $email
    ],array('sub_id'=>$id));
}

// Start to clean up DB after plugin deleted Function
function delete_plugin_database_table(){
    global $wpdb;
    $table_name = 'wp_rsg_sentence';
    $sql = "DROP TABLE IF EXISTS $table_name";
    $wpdb->query($sql);
}

// Start to sentence delete Function
register_uninstall_hook(__FILE__, 'delete_plugin_database_table');