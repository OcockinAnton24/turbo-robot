# System Cameras bot

# Example processing json in python
```python
import requests as r
import json as ass

uru = r.get('site/iupload.php')
io = ass.loads(uru.text)
status = io["status"]
msg = io["text"]
```