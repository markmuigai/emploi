from pyresparser import ResumeParser
import pathlib
import nltk
import spacy
import sys
import json

# nltk.download('stopwords')

path = sys.argv[1]

# path = f'{pathlib.Path.cwd()}' + '/app/Python/Sample CVs/alice_cv.pdf'
data = ResumeParser(path).get_extracted_data()

print(json.dumps(data))

