from django.urls import path
from .views import check_task

urlpatterns = [
    path("tasks/<int:task_id>/check/", check_task),
]
