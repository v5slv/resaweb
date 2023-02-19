//Sauvegarder les critères choisis dans le tri (sauf checkboxes)
document.getElementById("ordre").value = getSavedValue("ordre"); 
document.getElementById("capacite").value = getSavedValue("capacite");
document.getElementById("lit-simple").value = getSavedValue("lit-simple");
document.getElementById("lit-double").value = getSavedValue("lit-double");
        
        function saveValue(e){
            var id = e.id; 
            var val = e.value;
            localStorage.setItem(id, val);
        }

       
        function getSavedValue  (v){
            if (!localStorage.getItem(v)) {
                return "";
            }
            return localStorage.getItem(v);
        }

