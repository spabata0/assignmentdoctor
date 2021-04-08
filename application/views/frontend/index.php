<?=$header;?>

<div id="main-content">

<div class="container marketing">

  <div class="row featurette" id="main-content-inner">

    <div class="col-md-6" id="security-bar-placeholder">
      <div  class="text-center" id="security-badge-msg">
        <span class="text-thn md w600 white">SECURE GRADES</span><br> 
        <span class="text-thn md w600 white">WITH INTERNET'S MOST REPUTABLE</span><br/> 
        <span class="text-bld ml w600 white">ACADEMIC WRITING SERVICE</span>
        <br/><br/>
        <div id="snc-placeholder">
          <div class=" text-reg sm w200 white outline"><span class="moveit">PH.D QUALIFIED EXPERTS IN 100+ SUBJECTS</span></div>
          <div class=" text-reg sm w200 white outline"><span class="moveit">95.7% ORDERS DELIVERED WITHIN 3-24 HOURS</span></div>
          <div class=" text-reg sm w200 white outline"><span class="moveit">24/7 LIVE SUPPORT AND ORDER TRACKING</span></div>
          <div class=" text-reg sm w200 white outline"><span class="moveit">TURNITIN AND COPYSCAPE APPROVED PAPERS</span></div>
          <div class=" text-reg sm w200 white outline"><span class="moveit">100% PRIVACY AND MONEYBACK ASSURANCE</span></div>
        </div>
        <div id="snc-msg">
          <img class="" src="fe_assets/images/shield.png" alt=""/>
          <span class="text-reg md w600 orange">SECURE AND CONFIDENTIAL</span>
        </div>
        <div id="security-badges">
          <img class="" src="fe_assets/images/NortonLogo.png" width="155" height="74" alt=""/>
          <img class="" src="fe_assets/images/McAfeeLogo.png" width="155" height="74" alt=""/>
        </div>
       </div>

      </div>
    </div>

    <div class="col-md-6 col-sm-4" id="cost-calculator-placeholder"<>
      <div>
      <form action='<?=base_url();?>order/' method='post' name='process' enctype="multipart/form-data">
         <div class="text-reg md w600 text-center" id="calculator-header">CALCULATE YOUR ORDER PRICE</div>
         <div class="select-placeholder text-center">
          <select class="custom-select" name="order_name">
             <option selected value="1">Essay</option>
             <option value="2">Narrative Essay</option>
             <option value="3">Descriptive Essay</option>
             <option value="4">Argumentative Essay Term Paper</option>
             <option value="5">Research Paper</option>
             <option value="6">Draft</option>
             <option value="7">Abstract</option>
             <option value="8">Literature Review</option>
         </select>
         </div>
         <div class="select-placeholder text-center">
          <select class="custom-select" name="academic_level" id="type">
            <option selected value="hs">High school</option>
            <option value="col">College/University</option>
            <option value="mba">Masters/MBA</option>
            <option value="doc">Doctorate</option>
        </select>
         </div>
         <div class="select-placeholder text-center">
         <select class="custom-select" name="formatting" id="formatting">
            <option selected value="1">APA</option>
            <option value="2">MLA</option>
            <option value="3">Harvard</option>
            <option value="4">Chicago</option>
            <option value="5">Others</option>
          </select>
         </div>
         <div class="select-placeholder-small text-center">
           <div class="move-left">
              <select class="custom-select-small" name="urgency_level" id="days">
                <option selected value="1">1 Days</option>
                <option value="2">2 Days</option>
                <option value="3">3-4 Days</option>
                <option value="4">5-7 Days</option>
                <option value="5">7-8 Days</option>
                <option value="6">10 Days</option>
              </select>
              <span id="movepagenumber">
              <span class="text-reg reg w600">Pages</span>
                <button type="button" id="plus-button"></button>
                <input  type="text" value="1" id="pagetxt" name="pagetxt">
                <button type="button" id="minus-button"></button>
              </span>
           </div>

         </div>

      <div id="price-section">

         <div class="price-placeholder">
            <div class="col-md-9">
                <span class="amttitle text-reg sm w200 dgray">Standard Price</span>
            </div>
            <div class="col-md-3">
                <span class="a amtfig text-bld md w200 strike-thru ">$0.00</span>
            </div>
         </div>

        <div class="price-placeholder">
           <div class="col-md-9">
              <span class="amttitle text-reg sm w200 red">Discount</span>
           </div>
           <div class="col-md-3"> 
              <span class="pr amtfig text-bold rg w400 red" >0.00</span>
           </div>
         </div>

        <div class="price-placeholder" id="total">
          <div class="col-md-9">
             <span class="amttitle text-reg rg w200 lgray">Price After Discount</span>
          </div>
          <div class="col-md-3"> 
             <span class="d amtfig text-reg ml w200 white" >0.00</span><span style="visibility: hidden" class="origamt"></span>
          </div>
        </div>
        <div id="proceedorder">
          <span class="text-bld ml w600 white">
            <button type="submit" class="trans-button">PROCEED TO ORDER</button>
          </span>
        </div>
      </div>
      </div>
    </div>
  </div>   
  </form>      
</div>
</div>

</div>

<div class="row featurette" id="marketing-content-1">
  <div class="col-md-4 order-md-1 movedown" id="mc-1-inner">
    <span class="text-reg xl w600 dgray">PERKS</span>&nbsp;<span class="text-thn xl w600 dgray">YOU</span>
    <div class="moveup20"><span class="text-thn xl w600 dgray">GET</span></div>
    <p class="text-reg ss w200 dgray">Can't figure out how to complete your paper before the deadline? Our Experienced writers
       know how to write enticing essays, research papers and assignments that can help you achieve high grades. 
       Your materials will look professional and convey your message correctly without embarrassing typos, 
       spelling mistakes, or grammar mistakes.With Assignment Doctor writing service, you get 24/7 help to get you 
       going even during late-night hours, a convenience that guarantees good grades.
    </p>
  </div>
  <div class="col-md-5 order-md-2" id="mc-2-inner">
    <div class="grid-container">
      <div class="figure">
        <img class="image-main" src="fe_assets/images/Revisions.png" height="140" width="290" alt=""/>
        <img class="image-hover" src="fe_assets/images/Revisions2.png" height="140" width="290" alt=""/>
      </div>
      <div class="figure">
          <img class="image-main" src="fe_assets/images/Free Title Page.png" height="140" width="290" alt=""/>
          <img class="image-hover" src="fe_assets/images/Free Title Page2.png" height="140" width="290" alt=""/>
      </div>
      <div class="figure">
          <img class="image-main" src="fe_assets/images/Proofreading.png" height="140" width="290" alt=""/>
          <img class="image-hover" src="fe_assets/images/Proofreading2.png" height="140" width="290" alt=""/>
      </div>  
      <div class="figure">
          <img class="image-main" src="fe_assets/images/Annotation.png" height="140" width="290" alt=""/>
          <img class="image-hover" src="fe_assets/images/Annotation2.png" height="140" width="290" alt=""/>
      </div>
      <div class="figure">
        <img class="image-main" src="fe_assets/images/Plagiarism Free.png" height="140" width="290" alt=""/>
        <img class="image-hover" src="fe_assets/images/Plagiarism Free2.png" height="140" width="290" alt=""/>
      </div>
      <div class="figure">
          <img class="image-main" src="fe_assets/images/Formatting.png" height="140" width="290" alt=""/>
          <img class="image-hover" src="fe_assets/images/Formatting2.png" height="140" width="290" alt=""/>
      </div>  
      <div class="figure">
          <img class="image-main" src="fe_assets/images/Deadline.png" height="140" width="290" alt=""/>
          <img class="image-hover" src="fe_assets/images/Deadline2.png" height="140" width="290" alt=""/>
      </div>
      <div class="figure">
          <img class="image-main" src="fe_assets/images/Urgent Order.png" height="140" width="290" alt=""/>
          <img class="image-hover" src="fe_assets/images/Urgent Order2.png" height="140" width="290" alt=""/>
      </div>
      <div class="figure">
          <img class="image-main" src="fe_assets/images/Secure and Confidential.png" height="140" width="290" alt=""/>
          <img class="image-hover" src="fe_assets/images/Secure and Confidential2.png" height="140" width="290" alt=""/>
      </div>
    </div>
  </div>
</div>

<div class="row featurette" id="marketing-content-2">
  <div class="grid-container2">
    <div><img  src="fe_assets/images/moneybackGuarantee.png" height="90" width="90" alt=""/><br/>
    <br/><span class="text-reg md w600 white">100% Money back <br/>Guaranteed</span></div>
    <div><img  src="fe_assets/images/PlagiarismFree.png" height="90" width="90" alt=""/>><br/>
    <br/><span class="text-reg md w600 white">100% Plagiarism <br/>Free</span></div>
    <div><img  src="fe_assets/images/AcademicExperts.png" height="90" width="90" alt=""/><br/>
      <br/><span class="text-reg md w600 white">300+ Academic <br/>Experts</span></div>  
    <div><img  src="fe_assets/images/Subjects.png" height="90" width="90" alt=""/><br/>
      <br/><span class="text-reg md w600 white">Deals in 100+ <br/>Subjects</span>
    </div>
  </div>
</div>
<!--
<div class="row featurette sticky-header" id="marketing-content-3">
   <div class="col-md-4 text-thn lg w600 white" id="sticky-text-1">50% OFF IN ALL ORDERS</div>
   <div class="col-md-4 text-thn lg w600 white" id="sticky-text-2">LIMITED TIME OFFER</div>
   <div class="col-md-4 " id="sticky-text-2">
    <img  src="fe_assets/images/group165.png" id="sticky-button" widtth="276" height="70" alt=""/>
   </div>
</div>
-->

<div id="marketing-container-1">
  <div class="row featurette" id="marketing-content-4">
    <div class="col-md-12">
        <span class="text-reg xl w600 dgray">WHAT</span><span class="text-reg xx w600 blue"> WE DO</span>
        <span class="text-reg md w200 dgray">
        <p>Let our  experts handle your challenging<br/>tasks affordably</p>
        </span>

        <div id="what-we-do-content">
          If you are looking for help in your assignment our professional team of writers is ready to help you out. We aim to provide our tutoring services to educational support. From free learning sources to professional academic support services and tutoring, we’re here to help you at every stage of your education cycle.  Whether it be an essay writing, paper or thesis writing, our best essay writing service always copes up with your requirements within your timeline.
        </div>

        <div class="grid-container7" id="what-we-do-content2">
          <div class="text-left">
              <ul class="ad-list">
                <li>Essay</li>
                <li>Narrative Essay</li>
                <li>Descriptive Essay</li>
                <li>Argumentative Essay Term Paper</li>
                <li>Research Paper</li>
                <li>Draft</li>
                <li>Thesis</li>
                <li>Abstract</li>
                <li>Literature Review</li>
              </ul>
          </div>
          <div class="text-left">
            <ul class="ad-list">
              <li>Annotation</li>
              <li>Summary</li>
              <li>Assignment</li>
              <li>Problem Solving</li>
              <li>Editing</li>
              <li>Admission Essay</li>
              <li>Personal Statement</li>
              <li>Custom Essay</li>
              <li>Speech</li>
              <li>Project Report</li>
              <li>Algebra</li>
              <li>Press Release</li>
              </ul>
          </div>
          <div class="text-left">
            <ul class="ad-list">
              <li>Blog Writing</li>
              <li>Expository Essay</li>
              <li>Compare and Contrast Essay</li>
              <li>Persuasive Essay</li>
              <li>Analytical Research Paper</li>
              <li>Argumentative Research Paper</li>
              <li>Cause and Effect Paper</li>
              <li>Experimental Research Paper</li>
              <li>Survey Research Paper</li>
              <li>Book Review</li>
              </ul>
          </div>
          <div class="text-left">
            <ul class="ad-list">
              <li>Movie Review</li>
              <li>Business Plan</li>
              <li>Power Point Presentation</li>
              <li>Lab Report</li>
              <li>Paper Outline</li>
              <li>Thesis Proposal</li>
              <li>Research Proposal</li>
              <li>Scholarship Proposal</li>
              <li>Case Study</li>
              <li>Paraphrasing</li>
              <li>Article Writing</li>
              </ul>
          </div>
        </div> 

     </div>
  </div>
</div>

<div class="row featurette" id="marketing-content-5">

</div>

<div class="row featurette" id="marketing-content-6">
  <div class="col-md-12 text-center">
    <div id="stats-header"><span class="text-bld xx w600 white">OUR STATS</span></div>
    <div class="grid-container3">
      <div>
        <span class="text-bld xx w600 white count">8970</span><br/>
        <span class="text-reg ld rd w400 white">CONSULTATIONS</span>
      </div>
      <div>
        <span class="text-bld xx w600 white count">2000</span><br/>
        <span class="text-reg rd w400 white">WRITERS</span>
      </div>
      <div>
        <span class="text-bld xx w600 white count">28375</span><br/>
        <span class="text-reg rd w400 white">ORDERS COMPLETED</span>
      </div>
      <div>
        <span class="text-bld xx w600 white count">15080</span><br/>
        <span class="text-reg rd w400 white">CLIENTS</span>
      </div>
    </div>
  </div>
</div>

<div class="row featurette" id="marketing-content-7">
  <div class="col-md-12 text-center">
    <span class="text-reg xx w600 dgray">Order Your Paper in</span>&nbsp;
    <span class="text-reg xx w600 orange"> 4 simple Steps</span> <br/></br>
  </div>
  <div class="col-md-12 text-center" id="stepsimg">
    <img  src="fe_assets/images/4Steps.png" width="750" height="450" alt=""/>
  </div>
</div>

<div class="row featurette" id="marketing-content-8">
  <div class="col-md-12">
      <div class="text-reg ml w400 white text-center" id="emailmsg1">Distinction worthy paper seems like a far cry?</div>
      <div class="text-reg md w600 white text-center" id="emailmsg2">Let an expert do it for you!</div>
      <div class="gray-text-medium" id="email-placeholder">
        <input type="text" id="email-field" placeholder="enter your email address here">
      </div>
      <div class="text-center" id="email-button-placeholder"><img  src="fe_assets/images/ReadyOrderButton.png"  alt=""/></div>

  </div>
</div>

<div class="row featurette" id="marketing-content-9">
  <div class="float-container clearfix">

    <div class="float-child left">
      <div class="mc-4-text">
        <div class="text-left">
          <span class="text-reg xx w600 dgray " style="line-spacing:-1px">Why<span class="text-reg xx w600 orange"> Students </span>Come Back for More?</span> 
        </div>
        <div class="text-left">
          Our quality-first mindset. quickest turnaround time. affordable rates and reliable services set us apart from others.
        </div>
      </div>
    </div>
    
    <div class="float-child right">
      <div class="blue">

        <div class="grid-container6">
          <div><img  src="fe_assets/images/SatisfactionRate.png"  width="360" height="230" alt=""/></div>
          <div><img  src="fe_assets/images/InstantDelivery.png"  width="360" height="230" alt=""/></div>
          <div><img  src="fe_assets/images/Confidential.png"  width="360" height="230" alt=""/></div>  
          <div><img  src="fe_assets/images/OnlinePresence.png" width="360" height="230" alt=""/></div>
        </div>
      </div>
    </div>
    
  </div>
</div>

<div class="row featurette" id="marketing-content-10">

<div class="col-md-12 text-center" id="features-message"><span class="text-reg xx w600 dgray">Here Out from Our Most</span><span class="text-reg xx w600 orange"> Satisfied Customers </span></div>

<div class="carousel review-carousel-bar">

<div class="" id="reviews-placeholder">
  <div class="review-container text-center">
    <div class="review-header text-reg lg">MINDY FROM NYC</div>
    <div class="review-body">I am a digital marketing student, I have abudant ideas but I obviously need assistance while aligning them and making descriptive scripts and voice overs for my videos. I need someone to write the script for me and Assignment doctor sure provided me with that. Excellent Server, great turnaround.</div>
    <div class="review-stars"><img src="fe_assets/images/5 Stars.png"></div>
    <div class="review-title">Medical Student<br/>Bachelors</div>
  </div>
</div>

<div class="" id="reviews-placeholder">
  <div class="review-container text-center">
    <div class="review-header text-reg lg">MINDY FROM NYC</div>
    <div class="review-body">I am a digital marketing student, I have abudant ideas but I obviously need assistance while aligning them and making descriptive scripts and voice overs for my videos. I need someone to write the script for me and Assignment doctor sure provided me with that. Excellent Server, great turnaround.</div>
    <div class="review-stars"><img src="fe_assets/images/5 Stars.png"></div>
    <div class="review-title">Medical Student<br/>Bachelors</div>
  </div>
</div>

<div class="" id="reviews-placeholder">
  <div class="review-container text-center">
    <div class="review-header text-reg lg">MINDY FROM NYC</div>
    <div class="review-body">I am a digital marketing student, I have abudant ideas but I obviously need assistance while aligning them and making descriptive scripts and voice overs for my videos. I need someone to write the script for me and Assignment doctor sure provided me with that. Excellent Server, great turnaround.</div>
    <div class="review-stars"><img src="fe_assets/images/5 Stars.png"></div>
    <div class="review-title">Medical Student<br/>Bachelors</div>
  </div>
</div>

</div>
 
</div>   

<div class="row featurette" id="marketing-content-11">
<div class="col-md-12 text-center" id="features-message">
  <div id="sample-header"><span class="text-reg xx w600 white">Get Free Samples</span></div>
  <div class="sample-carousel">
    <div class="carousel sample-carousel-bar">

      <div class="sample-carousel-item">
        <div class="sample-carousel-content">
            <img src="fe_assets/images/pdf icon.png" width="57" height="66" align="right">
             <span class="text-reg rd w600 dgray">Research Proposal</span><br/>
             <span class="text-reg rg w200 dgray">Undergraduate, 6 Pages</span><br/><br/>
                <div class="moveup">
                  <span class="text-reg ss w400 dgray">Firearm Violence and how African Americans Youth Prevent it.</span>
                </div>
             <div class="moveleft">
              <div class="button-mgn"><img src="fe_assets/images/downloadbtn.png" width="122" height="48" align="right"></div>
              <div class="button-mgn"><img src="fe_assets/images/getstarted.png" width="122" height="48" align="right"></div>
            </div> 
        </div>
      </div>
      <div class="sample-carousel-item">
        <div class="sample-carousel-content">
          <img src="fe_assets/images/pdf icon.png" width="57" height="66" align="right">
          <span class="text-reg rd w600 dgray">Research Proposal</span><br/>
          <span class="text-reg rg w200 dgray">Undergraduate, 6 Pages</span><br/><br/>
             <div class="moveup">
               <span class="text-reg ss w400 dgray">Firearm Violence and how African Americans Youth Prevent it.</span>
             </div>
             <div class="moveleft">
              <div class="button-mgn"><img src="fe_assets/images/downloadbtn.png" width="122" height="48" align="right"></div>
              <div class="button-mgn"><img src="fe_assets/images/getstarted.png" width="122" height="48" align="right"></div>
            </div> 
      </div>
      </div>

      <div class="sample-carousel-item">
        <div class="sample-carousel-content">
          <img src="fe_assets/images/pdf icon.png" width="57" height="66" align="right">
          <span class="text-reg rd w600 dgray">Research Proposal</span><br/>
          <span class="text-reg rg w200 dgray">Undergraduate, 6 Pages</span><br/><br/>
             <div class="moveup">
               <span class="text-reg ss w400 dgray">Firearm Violence and how African Americans Youth Prevent it.</span>
             </div>
             <div>
              <div class="button-mgn"><img src="fe_assets/images/downloadbtn.png" width="125" height="48" align="right"></div>
              <div class="button-mgn"><img src="fe_assets/images/getstarted.png" width="125" height="48" align="right"></div>
            </div> 
        </div>
      </div>

      <div class="sample-carousel-item">
        <div class="sample-carousel-content">
          <img src="fe_assets/images/pdf icon.png" width="57" height="66" align="right">
          <span class="text-reg rd w600 dgray">Research Proposal</span><br/>
          <span class="text-reg rg w200 dgray">Undergraduate, 6 Pages</span><br/><br/>
             <div class="moveup">
               <span class="text-reg ss w400 dgray">Firearm Violence and how African Americans Youth Prevent it.</span>
             </div>
             <div>
              <div class="button-mgn"><img src="fe_assets/images/downloadbtn.png" width="125" height="48" align="right"></div>
              <div class="button-mgn"><img src="fe_assets/images/getstarted.png" width="125" height="48" align="right"></div>
            </div> 
        </div>
      </div>

    </div>
  </div>
</div>
</div>

<div class="row featurette" id="marketing-content-12">
<div class="col-md-6 order-md-1" id="mc-3-inner">
  <span class="text-reg xl w600 dgray">Whats your paper type?</span><br>
  <p class="text-reg md w400 dgray">We will assign it to an expert in seconds.</p>
</div>
<div class="col-md-4 order-md-2" id="mc-4-inner">
<div class="select-placeholder-large text-center">
  <select class="custom-select-large">
     <option selected>Essay</option>
     <option value="2">Narrative Essay</option>
     <option selected>Descriptive Essay</option>
     <option value="2">Argumentative Essay Term Paper</option>
     <option selected>Research Paper</option>
     <option value="2">Draft</option>
     <option selected>Thesis</option>
     <option value="2">Abstract</option>
     <option selected>Literature Review</option>
 </select>
 <div class="moveit move-left">
    <button id="order-button"></button>
 </div>
 </div>
</div>
</div>

<?=$footer;?>

