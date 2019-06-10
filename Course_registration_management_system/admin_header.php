<style>
.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 18px;  
  border: none;
  outline: none;
  color: white;
  padding: 10px 14px;
  background-color: inherit;
  font-family: cambria math;
  font-weight:bold;
  margin: 0;
}

.dropdown:hover .dropbtn {
  background-color: #A9A9A9;
}

.dropdown-content {
  font-size: 17px;  
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
<div class="header" id="myHeader">
  <img src="images/BUBT-LOGO-1_01.png" width="300" height="120">
  <ul><b>
  <li><a href="admin_profile.php">Home</a></li>
  <div class="dropdown">
    <button class="dropbtn">Add New... 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
  <a href="add_student.php">Add New Student</a>
  <a href="add_teacher.php">Add New Teacher</a>
  <a href="add_course.php">Add New Course</a>
  <a href="add_incharge.php">Add Incharge</a>
  <a href="course_offer.php">New Course Offer</a>
    </div>
  </div> 
  <div class="dropdown">
    <button class="dropbtn">See List... 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
  <a href="student_list.php">Student List</a>
  <a href="teacher_list.php">Teacher List</a>
  <a href="course_search.php">Course List</a>
  <a href="search_incharge.php">Incharge List</a>
  <a href="search_offered_course.php">Offered Course List</a>
    </div>
  </div> 
  <div class="dropdown">
    <button class="dropbtn">Primary Password... 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
  <a href="student_pass.php">Students Primary Password</a>
  <a href="teacher_pass.php">Teachers Primary Password</a>
    </div>
  </div> 
  <li><a href="update.php">Update</a></li>
  <li><a href="search.php">Search</a></li>
  <li1><a href="logout1.php">Logout</a></li1></b>
</ul>

</div>
<hr>