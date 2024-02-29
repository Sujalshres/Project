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