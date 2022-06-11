<script>
Livewire.on('postAdded', (postId, type, position) => {
	console.log(type)
		notif({
				msg: "<b>Success:</b> " + postId,
				type: type,
				position: position
			});
			$('#normalmodal').modal('hide');
			$('#delete_shedule_modal').modal('hide');
			$('#EditSchedule').modal('hide');
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
 
 
</script>