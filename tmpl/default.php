<?php
/**
 *
 *
 * @package   mod_riskprofiler
 * copyright Blackdale/Lukman Hussein
 * @license GPL3
 */

// no direct access
defined('_JEXEC') or die;



# Simplified repetitive copy
    $risk_note = 'Having hard time deciding what suits you best? Let’s have a chat to find out how we can work together to achieve your investment needs. Drop us a note at <a href="mailto:customercare@hwangim.com" onclick="_gaq.push([\'_trackEvent\', \'Content\', \'Email\', \'customercare@hwangim.com\']);">customercare@hwangim.com</a> or <a href="contact-us/speak-to-us/">reach us</a> using your preferred choice of communication mode, and we will contact you!';
    $score_note = '<p>This is a simple gauge of your risk appetite. Investment recommendation is best done when we understand your objective, time horizon, overall investment portfolio and capital outlay.</p>
        <ul>
            <li class="yourscore verylow">0-5: Very Low risk appetite. Seek capital preservation.</li>
            <li class="yourscore low">6-11: Low risk appetite. Seek income with low risk tolerance.</li>
            <li class="yourscore moderate">12-18: Moderate risk appetite. Seek a balance of income and growth with moderate risk tolerance.</li>
            <li class="yourscore high">19-25: High risk appetite. Seek growth with moderately high risk tolerance.</li>
            <li class="yourscore veryhigh">26-32: Very High risk appetite. Seek growth with high risk tolerance.</li>
        </ul>';
    $score_note_skipped = '<p>This is a simple gauge of your risk appetite. Investment recommendation is best done when we understand your objective, time horizon, overall investment portfolio and capital outlay.</p>
        <ul>
            <li>0-5: Very Low risk appetite. Seek capital preservation.</li>
            <li>6-11: Low risk appetite. Seek income with low risk tolerance.</li>
            <li>12-18: Moderate risk appetite. Seek a balance of income and growth with moderate risk tolerance.</li>
            <li>19-25: High risk appetite. Seek growth with moderately high risk tolerance.</li>
            <li>26-32: Very High risk appetite. Seek growth with high risk tolerance.</li>
        </ul>';

    $fund_risk = array(
        0 => 'Very Low Risk',
        1 => 'Low Risk',
        2 => 'Moderate Risk',
        3 => 'High Risk',
        4 => 'Very High Risk'
    );
?>



<script type="text/javascript">
jQuery(document).ready(function($) {

    $("#risk_profiler").submit(function(){        
        // _gaq.push(['_trackPageview', '[<?=$uri;?>-thankyou]']);

        $(".hidden").hide();
        $(".score").html("");
        $(".message").html("");
        $(".yourscore").removeClass('strong');

        var Q1,Q2,Q3,Q4,Q5,Q6,Q7,Q8,Q9,Q10,Q11,Q12, result;
        result_risk  = Array();
        window.push_result  = Array();

        Q1 = Number($("input[name=q1]:checked",this).val());
        Q2 = Number($("input[name=q2]:checked",this).val());
        Q3 = Number($("input[name=q3]:checked",this).val());
        Q4 = Number($("input[name=q4]:checked",this).val());
        Q5 = Number($("input[name=q5]:checked",this).val());
        Q6 = Number($("input[name=q6]:checked",this).val());
        Q7 = Number($("input[name=q7]:checked",this).val());
        Q8 = Number($("input[name=q8]:checked",this).val());
        Q9 = Number($("input[name=q9]:checked",this).val());
        Q10 = Number($("input[name=q10]:checked",this).val());
        Q11 = Number($("input[name=q11]:checked",this).val());
        Q12 = Number($("input[name=q12]:checked",this).val());

        result = parseFloat(Q1+Q2+Q3+Q4+Q5+Q6+Q7+Q8+Q9+Q10+Q11+Q12);

        if(isNaN(result)){
            $(".message").html('Please complete all the questions.');
        } else {

            if(result<=5.4){
                $(".very_low_risk").show();
                $(".verylow").addClass('strong');
            } else if(result>=5.4 && result<=11.4) {
                $(".low_risk").show();
                $(".low").addClass('strong');
            } else if(result>=12.4 && result<=18.4) {
                $(".moderate_risk").show();
                $(".moderate").addClass('strong');
            } else if(result>=19.4 && result<=25.4) {
                $(".high_risk").show();
                $(".high").addClass('strong');
            } else {
                $(".very_high_risk").show();
                $(".veryhigh").addClass('strong');
            }

            $.scrollTo('.test_result', 800); 

            $(".result").show();
            $(".score").html('Your score: '+result);
        }
        return false;
    });

    $('.skipbtn').live('click', function(){ 
        $(".skipped_result").toggle();  // skipped result
        $(".test_result").toggle();     // test result
        $('#risk_profiler').toggle();   // form
        $(this).hide();
        $('.backbtn').show();
    });
    $('.backbtn').live('click', function(){ 
        $(".skipped_result").toggle();  // skipped result
        $(".test_result").toggle();     // test result
        $('#risk_profiler').toggle();   // form
        $(this).hide();
        $('.skipbtn').show();
    });

});
</script>



<div class="risk_profiler">
<div class="skip">
    <input class="skipbtn" type="button" value="Skip to Result">
    <input class="backbtn"  type="button" value="Back to Test" style="display:none;">
</div>
<h2><?= $title ?></h2>



<!-- Form Test -->
<form id="risk_profiler" action="">
<div class="input">
    <div class="row">        
        <div class="question"><span class="number">1.</span>Age:</div>
        <label><input type="radio" name="q1" value="0" />> 60</label>
        <label><input type="radio" name="q1" value="1" />50 - 60</label>
        <label><input type="radio" name="q1" value="2" />40 - 50</label>
        <label><input type="radio" name="q1" value="3" />30 - 40</label>
        <label><input type="radio" name="q1" value="4" />< 30</label>
    </div>
    <div class="row"> 
    <div class="question"><span class="number">2.</span>Annual Income:</div>
        <label><input type="radio" name="q2" value="0" />RM 0 - 100,000</label>
        <label><input type="radio" name="q2" value="1" />RM 101,000 - 150,000</label>
        <label><input type="radio" name="q2" value="2" />RM 150,000 and above</label>
    </div>
    <div class="row"> 
    <div class="question"><span class="number">3.</span>Estimated Liability:</div>
        <label><input type="radio" name="q3" value="0" />RM 1,000,001 and above</label>
        <label><input type="radio" name="q3" value="1" />RM 100,001 - 1,000,000</label>
        <label><input type="radio" name="q3" value="2" />RM 0 - 100,000</label>
    </div>
    <div class="row"> 
    <div class="question"><span class="number">4.</span>Estimated Networth:</div>
        <label><input type="radio" name="q4" value="0" />RM 0 - 100,000</label>
        <label><input type="radio" name="q4" value="2" />RM 100,001 - 1,000,000</label>
        <label><input type="radio" name="q4" value="4" />RM 1,000,000 and above</label>
    </div>
    <div class="row"> 
    <div class="question"><span class="number">5.</span>Objective:</div>
        <label><input type="radio" name="q5" value="0" />Capital Preservation</label>
        <label><input type="radio" name="q5" value="1" />Income</label>
        <label><input type="radio" name="q5" value="2" />Balanced</label>
        <label><input type="radio" name="q5" value="3" />Income and Growth</label>
        <label><input type="radio" name="q5" value="4" />Growth</label>
    </div>
    <div class="row"> 
    <div class="question"><span class="number">6.</span>Duration of Investment:</div>
        <label><input type="radio" name="q6" value="0" /><3 years</label>
        <label><input type="radio" name="q6" value="2" />≥ 3 to 5 years</label>
        <label><input type="radio" name="q6" value="4" />> 5 years </label>
    </div>
    <div class="row"> 
    <div class="question"><span class="number">7.</span>Expectation (Annualized Gain):</div>
        <label><input type="radio" name="q7" value="0" />0 - 4%</label>
        <label><input type="radio" name="q7" value="1" />4 - 6%</label>
        <label><input type="radio" name="q7" value="2" />6 - 8%</label>
        <label><input type="radio" name="q7" value="3" />8 - 12%</label>
        <label><input type="radio" name="q7" value="4" />12% and above</label>
    </div>
    <div class="row"> 
    <div class="question"><span class="number">8.</span>Investor Risk Tolerance:</div>
        <label><input type="radio" name="q8" value="0" />Capital preservation is very important</label>
        <label><input type="radio" name="q8" value="2" />Capital preservation is my objective but I can accept some capital reduction</label>
        <label><input type="radio" name="q8" value="4" />I understand market risk and willing to accept capital reduction in my investment</label>
    </div>
    <div class="row"> 
    <div class="question"><span class="number">9.</span>Investment Experience & Years of Experience:</div>
    <dl>
        <dt><label>Bonds</label></dt>
        <dd>
            <label><input type="radio" name="q9" value="0" />< 1 year</label>
            <label><input type="radio" name="q9" value="1" />> 1 year</label>
        </dd>
        <dt><label>Derivatives</label></dt>
        <dd>
            <label><input type="radio" name="q10" value="0" />< 1 year</label>
            <label><input type="radio" name="q10" value="1" />> 1 year</label>
        </dd>
        <dt><label>Equities</label></dt>
        <dd>
            <label><input type="radio" name="q11" value="0" />< 1 year</label>
            <label><input type="radio" name="q11" value="1" />> 1 year</label>
        </dd>
        <dt><label>Unit Trust Fund</label></dt>
        <dd>
            <label><input type="radio" name="q12" value="0" />< 1 year</label>
            <label><input type="radio" name="q12" value="1" />> 1 year</label>
        </dd>
    </dl>  
    </div>
</div>
<div class="clear"></div>
        <div class="submit">
            <input type="submit" value="Gauge my risk appetite">
            <div class="message"></div>
        </div>
<div class="clear"></div>
</form>



<!-- Skipped Test -->
<div class="output skipped_result hidden">
    <div class="result">
        <div class="fund_recommend">
        <div class="score_note"><?=$score_note_skipped;?></div>
<?
# Skipped Fund Recommendation
        for($x=1; $x<=5; $x++){
        echo '<div class="'.classized($fund_risk[$x-1]).'"><h4>Fund recommendations:</br>'.$fund_risk[$x-1].' Appetite</h4>';
        echo '<ul>';
            for($y=1; $y<=5; $y++){
                $itemid = $params->get('G'.$x.'P'.$y);
                if($itemid != 'null')
                $value = runsql($itemid);
                echo '<li><a href="/'.$value->path.'">'.$value->title.'</a></li>';
            }
        echo '</ul></div>';
        }
?>   
        <div class="clear"></div>
        </div>
        <div class="risk_note"><?=$risk_note;?></div>
        <div class="submit"><input type="button" onClick="window.print();" value="Print"></div>
    </div>
</div>



<!-- Output Test -->
<div class="output test_result">
    <div class="result hidden">
        <div class="fund_recommend">
        <div class="score_note"><h4 class="score"></h4><?=$score_note;?></div>
<?
# Test Fund Recommendation
        for($x=1; $x<=5; $x++){
        echo '<div class="'.classized($fund_risk[$x-1]).' hidden"><h4>Fund recommendations:</br>'.$fund_risk[$x-1].' Appetite</h4>';
        echo '<ul>';
            for($y=1; $y<=5; $y++){
                $itemid = $params->get('G'.$x.'P'.$y);
                if($itemid != 'null')
                $value = runsql($itemid);
                echo '<li><a href="/'.$value->path.'">'.$value->title.'</a></li>';
            }
        echo '</ul></div>';
        }
?>   
        <div class="clear"></div>
        </div>
        <div class="risk_note"><?=$risk_note;?></div>
        <div class="submit"><input type="button" onClick="window.print();" value="Print my answer"></div>
    </div>
</div>


</div>
<div class="clear"></div>
 