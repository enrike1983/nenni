const getValueAt= (item,tablet,desktop,wide) => {
    if(wide && window.innerWidth >= 1280 ) {
        return wide
    } else if(window.innerWidth >= 1024 ) {
        if(desktop >= 0) {
            return desktop
        } else {
            item.visible = false;
        }
    } else {
        if(tablet >= 0) {
            return tablet
        } else {
            item.visible = false;
        }
    }
}

export default getValueAt;
