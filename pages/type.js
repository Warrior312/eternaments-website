const observer = new IntersectionObserver((entries) =>{
    entries.forEach((entry) => {
        console.log(entry)
        if (entry.isIntersecting) {
            entry.target.classList.add('typeShow')
            

        } else {
            entry.target.classList.remove('typeShow')
        }
    })



}
)

const hiddenElements = document.querySelectorAll('.typeHide')
hiddenElements.forEach((el) => observer.observe(el));