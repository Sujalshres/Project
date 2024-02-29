// script for admin icon 

let admin = document.getElementById('admin-icon-li');
admin.addEventListener('click', function run()
{
    let sel = document.getElementById('options-admin');
    if (sel.style.opacity != '1')
    {
        sel.style.display = 'block';
        sel.style.opacity = '1';
        // setTimeout(function ()
        // {
        // },100)
    }
    else
    {
        sel.style.opacity = '0';
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
    if (sel.style.opacity != '1')
    {
        sel.style.display = 'block';
        setTimeout(function ()
        {
            sel.style.opacity = '1';
        },100)
    }
    else
    {
        sel.style.opacity = '0';
        setTimeout(function ()
        {
            sel.style.display = 'none';
        },1000)
    }

})

// script for notification icon ends



// Admin page theme

function theme()
{
    document.body.classList.toggle('darkmode');
    let logo = document.getElementById('logo');
}


// Admin page theme ends