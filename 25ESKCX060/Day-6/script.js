let students = [
{
id:1,
name:"Aarav Sharma",
email:"aarav.sharma@college.com",
cgpa:"8.9",
image:"https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=300&h=300&fit=crop"
},
{
id:2,
name:"Priya Verma",
email:"priya.verma@college.com",
cgpa:"9.3",
image:"https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=300&h=300&fit=crop"
},
{
id:3,
name:"Rohan Gupta",
email:"rohan.gupta@college.com",
cgpa:"8.2",
image:"https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=300&h=300&fit=crop"
},
{
id:4,
name:"Sneha Singh",
email:"sneha.singh@college.com",
cgpa:"9.1",
image:"https://images.unsplash.com/photo-1488426862026-3ee34a7d66df?w=300&h=300&fit=crop"
},
{
id:5,
name:"Ankit Kumar",
email:"ankit.kumar@college.com",
cgpa:"7.8",
image:"https://images.unsplash.com/photo-1504593811423-6dd665756598?w=300&h=300&fit=crop"
},
{
id:6,
name:"Neha Patel",
email:"neha.patel@college.com",
cgpa:"8.7",
image:"https://images.unsplash.com/photo-1517841905240-472988babdf9?w=300&h=300&fit=crop"
},
{
id:7,
name:"Rahul Mehta",
email:"rahul.mehta@college.com",
cgpa:"8.5",
image:"https://images.unsplash.com/photo-1504257432389-52343af06ae3?w=300&h=300&fit=crop"
},
{
id:8,
name:"Simran Kaur",
email:"simran.kaur@college.com",
cgpa:"9.0",
image:"https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=300&h=300&fit=crop"
},
{
id:9,
name:"Karan Malhotra",
email:"karan.malhotra@college.com",
cgpa:"8.4",
image:"https://images.unsplash.com/photo-1502767089025-6572583495b0?w=300&h=300&fit=crop"
},
{
id:10,
name:"Muskan Arora",
email:"muskan.arora@college.com",
cgpa:"9.5",
image:"https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=300&h=300&fit=crop"
}
];

$(document).ready(function () {

    displayStudents(students);

    $("#search").on("keyup", function () {

        let search = $(this).val().toLowerCase();

        let result = students.filter(function(student){
            return student.name.toLowerCase().startsWith(search);
        });

        displayStudents(result);
    });

});

function displayStudents(data){

    $("#user-container").empty();

    $("#count").text("Showing " + data.length + " Students");

    if(data.length == 0){
        $("#user-container").html("<h3 class='text-center text-danger'>No Student Found</h3>");
        return;
    }

    data.forEach(function(student,index){

        let color = index % 2 == 0 ? "even-card" : "";

        let card = `
        <div class="col-md-4 mb-4">
            <div class="card shadow ${color}">
                
               <img src="${student.image}" class="card-img-top p-3">
               
                <div class="card-body text-center">
                    <h5>${student.name}</h5>
                    <p><strong>Email:</strong> ${student.email}</p>
                    <p><strong>CGPA:</strong> ${student.cgpa}</p>
                </div>
            </div>
        </div>
        `;

        $("#user-container").append(card);
    });

}
