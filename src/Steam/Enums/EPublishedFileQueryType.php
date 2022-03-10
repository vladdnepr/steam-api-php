<?php

namespace SquegTech\Steam\Enums;

enum EPublishedFileQueryType: int
{
    case RankedByVote = 0;
    case RankedByPublicationDate = 1;
    case AcceptedForGameRankedByAcceptanceDate = 2;
    case RankedByTrend = 3;
    case FavoritedByFriendsRankedByPublicationDate = 4;
    case CreatedByFriendsRankedByPublicationDate = 5;
    case RankedByNumTimesReported = 6;
    case CreatedByFollowedUsersRankedByPublicationDate = 7;
    case NotYetRated = 8;
    case RankedByTotalUniqueSubscriptions = 9;
    case RankedByTotalVotesAsc = 10;
    case RankedByVotesUp = 11;
    case RankedByTextSearch = 12;
    case RankedByPlaytimeTrend = 13;
    case RankedByTotalPlaytime = 14;
    case RankedByAveragePlaytimeTrend = 15;
    case RankedByLifetimeAveragePlaytime = 16;
    case RankedByPlaytimeSessionsTrend = 17;
    case RankedByLifetimePlaytimeSessions = 18;
    case RankedByInappropriateContentRating = 19;
}