// script for admin icon 

let admin = document.getElementById('admin-icon-li');

admin.addEventListener('click', function run()
{
    let sel = document.getElementById('options-admin');
    if (sel.style.display != 'block')
    {
        // sel.style.opacity = '1';
        sel.style.display = 'block';
        // setTimeout(function ()
        // {
        // },100)
    }
    else
    {
        // sel.style.opacity = '0';
        sel.style.display = 'none';
        // setTimeout(function ()
        // {
        // },1000)
    }
})

// script for admin icon ends


// script for notification icon 

let notification = document.getElementById('notification-icon-li');

notification.addEventListener('click', function run()
{
    let sel = document.getElementById('notification');
    if (sel.style.display != 'block')
    {
        sel.style.display = 'block';
        // setTimeout(function ()
        // {
        // },100)
    }
    else
    {
        sel.style.display = 'none';
        // setTimeout(function ()
        // {
        // },1000)
    }

})

// script for notification icon ends


// Admin page theme

function theme()
{
    document.body.classList.toggle('darkmode');
}


// Admin page theme ends




// script to add subject according to semester 

function updatesubject()
{
    let semester = document.getElementById('semester');
    let subject = document.getElementById('subject');

    subject.innerHTML = '';

    if(semester.value == 1)
    {
        addsubject("","--Select a subject--",subject);
        addsubject("cfa_1","Computer Fundamentals",subject);
        addsubject("digital_logic_1","Digital Logic",subject);
        addsubject("english_1","English",subject);
        addsubject("mathematics_1","Mathmatics",subject);
        addsubject("society_and_technology_1","Society and Technology",subject);
    }
    else if(semester.value == 4)
    {
        addsubject("","--Select a subject--",subject);
        addsubject("dbms_4","Database Management System",subject);
        addsubject("numerical_methods_4","Numerical Methods",subject);
        addsubject("operating_system_4","Operating System",subject);
        addsubject("scripting_language_4","Scripting Language",subject);
        addsubject("software_engineering_4","Software Engineering",subject);
    }
    else
    {
        addsubject("","--Select a subject--",subject);
    }
}

function addsubject(value,text,subject)
{
    let option = document.createElement('option');
    option.text = text;
    option.value = value;
    subject.appendChild(option);
}


// script to add subject according to semester ends



//script to add subject according to semester for edit or delete section

function updatesubject2()
{
    let semester = document.getElementById('semester2');
    let subject = document.getElementById('subject2');

    subject.innerHTML = '';

    if(semester.value == 1)
    {
        addsubject("","--Select a subject--",subject);
        addsubject("cfa_1","Computer Fundamentals",subject);
        addsubject("digital_logic_1","Digital Logic",subject);
        addsubject("english_1","English",subject);
        addsubject("mathematics_1","Mathmatics",subject);
        addsubject("society_and_technology_1","Society and Technology",subject);
    }
    else if(semester.value == 4)
    {
        addsubject("","--Select a subject--",subject);
        addsubject("dbms_4","Database Management System",subject);
        addsubject("numerical_methods_4","Numerical Methods",subject);
        addsubject("operating_system_4","Operating System",subject);
        addsubject("scripting_language_4","Scripting Language",subject);
        addsubject("software_engineering_4","Software Engineering",subject);
    }
    else
    {
        addsubject("","--Select a subject--",subject);
    }
}


//script to add subject according to semester for edit or delete section ends



// script to ask for confirmation while deleting questions 

function confirmdelete()
{
    return confirm("Are you sure to delete?");
}

// script to ask for confirmation while deleting questions ends