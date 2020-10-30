import sys
import json
import textract

path = sys.argv[1]

print(textract.process(path))


