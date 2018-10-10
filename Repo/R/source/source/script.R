#Ejemplo 1
library(wnominate)
UN<- read.csv("source.csv", header = FALSE, strip.white = TRUE)
rm(list = ls(all = TRUE))
data(UN)
dataUN <- as.matrix(UN)
UN[1:5, 1:6]
UNames <- UN[, 1]
legData <- matrix(UN[, 2], length(UN[, 2]), 1)
colnames(legData) <- "party"
UN <- UN[, - c(1, 2)]

rc <- rollcall(UN, yea = c(1, 2, 3), nay = c(4, 5, 6), missing = c(7, 8, 9), notInLegis = 0, legis.names = UNames, legis.data = legData, desc = "UN Votes", source = "www.voteviwe.com")
result <- wnominate(rc, polarity = c(1, 1))
summary(result)
par(mfrow = c(1, 1))
plot(result)

