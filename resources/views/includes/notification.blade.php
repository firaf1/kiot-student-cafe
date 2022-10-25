<script>
    Livewire.on('postAdded', (postId, type, position, bold) => {
        console.log(type)
        notif({
            msg: "<b>"+bold+"</b> " + postId,
            type: type,
            position: position
        });
        $('#normalmodal').modal('hide');
        $('#delete_shedule_modal').modal('hide');
        $('#EditSchedule').modal('hide');
        if(bold == 'Success')
        $('#signApproved').modal('hide');
    })

    Livewire.on('EditscheduleModal', (postId) => {

        $('#EditSchedule').modal('show');
    })
    Livewire.on('dangerNotification', postId => {
        notif({
            msg: "<b>Success:</b> " + postId,
            type: "error",
            position: "center"
        });
        $('#delete_shedule_modal').modal('hide');
    })
    Livewire.on('Show_shedule_warning_modal', postId => {

        $('#delete_shedule_modal').modal('show');
    })


    Livewire.on('SweetAletSuccessNotification', (postId, type, position) => {

        $('#addUser').modal('hide');
        $('#editUser').modal('hide');
        	
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: postId
        })



    })
    Livewire.on('deleted_sweet_alert_modal', (postId, type, position) => {
        $('#userDeleteModal').modal('show');	

})
Livewire.on('editUserModalShow', () => {
 
        $('#editUser').modal('show');	

})
Livewire.on('sweet_alert_comfirmation', (message, type, title) => {
      	
    Swal.fire({
  icon: type,
  title: title,
  text: message,
 
})
})
Livewire.on('signApproved', (message, type, title) => {
      	
    $('#signApproved').modal('show');
      })
Livewire.on('sweet_alert_comfirmation', (message, type, title) => {
      	
          Swal.fire({
        icon: type,
        title: title,
        text: message,
    })
      swal({
			title: "Something Went Wrong",
			text: "Please fix the issue the issue file not loaded & items not found",
			type: "error",
			showCancelButton: true,
			confirmButtonText: 'Exit',
			cancelButtonText: 'Stay on the page'
		});
      })
 
		
	 
</script>
