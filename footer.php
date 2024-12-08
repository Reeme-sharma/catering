</section>
    <footer>this is footer part</footer>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="//code.jquery.com/jquery-3.7.1.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script src="//cdn.datatables.net/2.1.8/js/dataTables.js"></script>
  <script src="//cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>  
   
  
  
  <script>
    $(document).ready(function()
  {
    var oTable =$('#list').dataTable({
     "aoColumnDefs": [{
            "bSortable":false,
            "aTargets":[0,1,2,3,4,5,6,7]                       
      },
    ]
    });
  })

  function checkdel(allobj)
  {
    let all = document.querySelectorAll('.delc');
    for(let i=0; i < all.length; i++)
  {
    all[i].checked = allobj.checked;
  }
  ditem.style.display = allobj.checked?"":'none';   //when we click on ('all') button then it will show the delete button otherwise it hide it
 }

 function displaybtn()             //when we click on single checkbox for delete then it will show delete button
  {
    let alls = document.querySelectorAll('.delc');
    counter = 0;
    for(let i=0; i < alls.length; i++)
  {
    if(alls[i].checked)
  {
    // counter = 1;
    // break;
      counter++;
  }
  }
  ditem.style.display = counter?"":'none'; 
  
  if(counter==alls.length)  //when all checkbox is checked then ('all') button will be checked automaticaly
  {
    all.checked=true;
  }
  else
  {
    all.checked=false;
  }
}
      
  </script>
</body>
</html>


