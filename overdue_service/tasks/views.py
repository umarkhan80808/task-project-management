from django.http import JsonResponse

def check_task(request, task_id):
    role = request.GET.get("role", "user")

    return JsonResponse({
        "task_id": task_id,
        "role": role,
        "status": "checked",
        "success": True
    })
