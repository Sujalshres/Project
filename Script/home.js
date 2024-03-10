let navbar = document.getElementById('navbar');
let navbar_visible = false;

function toggle()
{
    if(navbar_visible == false)
    {
        navbar.style.inset = '4rem auto auto 0rem';
        navbar_visible = true;
    }
    else
    {
        navbar.style.inset = '4rem auto auto -7rem';
        navbar_visible = false;
    }
}