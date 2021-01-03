
Pending {{ count(\App\CvEditRequest::where('cv_editor_id',$editor->id)->where('submitted_on',null)->get()) }} | Assigned {{ count($editor->cvEditRequests) }} | Completed {{ count(\App\CvEditRequest::where('cv_editor_id',$editor->id)->where('submitted_on','!=',null)->get()) }} 
