import _ from 'underscore'

let teamEl,teamImages,teamHotspots,teamMembers;
let currentMember = 0;
let isCreated = false;

const init = () => {
    teamEl = document.querySelector('.m-team');
    if(!teamEl) return;
    teamImages = teamEl.querySelectorAll('.m-team__images li');
    teamHotspots = teamEl.querySelectorAll('.m-team__hotspots li');
    teamMembers = teamEl.querySelectorAll('.m-team__members li');
    currentMember = 0;
    attachEvents();
}

const showMember = (i,e) => {
    e.preventDefault();
    _.each(teamImages,(img,k)=>{
        if(i==k)
            img.classList.add('active')
        else 
            img.classList.remove('active')
    })
    _.each(teamHotspots,(hs,k)=>{
        if(i==k)
            hs.classList.add('active')
        else 
            hs.classList.remove('active')
    })
    _.each(teamMembers,(m,k)=>{
        if(i==k)
            m.classList.add('active')
        else 
            m.classList.remove('active')
    })

}

const attachEvents = () => {
    _.each(teamHotspots, (hs,i) => {
        hs.addEventListener('click', showMember.bind(null,i))
    })
    isCreated = true;
}

export default () => {
    return {
        init,
        // destroy,
    }
    
}


